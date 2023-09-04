<?php

namespace App\Domains\Auth\Models;

use App\Domains\Auth\Models\Traits\Attribute\UserAttribute;
use App\Domains\Auth\Models\Traits\Method\UserMethod;
use App\Domains\Auth\Models\Traits\Relationship\UserRelationship;
use App\Domains\Auth\Models\Traits\Scope\UserScope;
use App\Domains\Auth\Notifications\Frontend\ResetPasswordNotification;
use App\Domains\Auth\Notifications\Frontend\VerifyEmail;
use App\Mail\OtpMail;
use App\Models\Redeem;
use App\Models\TopUp;
use App\Models\Voucher;
use App\Notifications\OtpNotification;
use DarkGhostHunter\Laraguard\Contracts\TwoFactorAuthenticatable;
use DarkGhostHunter\Laraguard\TwoFactorAuthentication;
use Database\Factories\UserFactory;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 */
class User extends Authenticatable implements MustVerifyEmail, TwoFactorAuthenticatable
{
    use HasApiTokens,
        HasFactory,
        HasRoles,
        Impersonate,
        MustVerifyEmailTrait,
        Notifiable,
        SoftDeletes,
        TwoFactorAuthentication,
        UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope;

    public const TYPE_ADMIN = 'admin';
    public const TYPE_USER = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'email',
        'email_verified_at',
        'password',
        'password_changed_at',
        'active',
        'timezone',
        'last_login_at',
        'last_login_ip',
        'to_be_logged_out',
        'provider',
        'provider_id',
        'phone',
        'whatsapp_validate_at',
        'completed_at',
        'complete_survey_at',
        'point',
        'register_channel',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'last_login_at',
        'email_verified_at',
        'password_changed_at',
        'whatsapp_validate_at',
        'completed_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'last_login_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'to_be_logged_out' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $appends = [
        'avatar',
        'date_of_birth'
    ];

    /**
     * @var string[]
     */
    protected $with = [
        'permissions',
        'roles',
        'detail',
        'address_data',
        'addresses_data'
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the registration verification email.
     */
    public function sendEmailVerificationNotification(): void
    {
        // $this->notify(new VerifyEmail);
    }

    public function sendOtpNotification($otp)
    {
        $this->notify(new OtpNotification($otp));
    }

    /**
     * Return true or false if the user can impersonate an other user.
     *
     * @param void
     * @return bool
     */
    public function canImpersonate(): bool
    {
        return $this->can('admin.access.user.impersonate');
    }

    /**
     * Return true or false if the user can be impersonate.
     *
     * @param void
     * @return bool
     */
    public function canBeImpersonated(): bool
    {
        return ! $this->isMasterAdmin();
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }

    /**
     * Get the detail that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail(): HasOne
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id');
    }

    /**
     * Get the detail that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address_data(): HasOne
    {
        return $this->hasOne(UserAddress::class, 'user_id', 'id')->where('is_primary', 1);
    }

    /**
     * Get all of the addresses_data for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses_data(): HasMany
    {
        return $this->hasMany(UserAddress::class, 'user_id', 'id');
    }

    /**
     * Get the voucher associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function voucher(): HasOne
    {
        return $this->hasOne(Voucher::class, 'user_id', 'id');
    }

    /**
     * Get all of the topups for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topups(): HasMany
    {
        return $this->hasMany(TopUp::class, 'user_id', 'id');
    }

    /**
     * Get all of the topups for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function redeems(): HasMany
    {
        return $this->hasMany(Redeem::class, 'user_id', 'id');
    }

    /**
     * Get the offline_reward associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function offline_reward(): HasOne
    {
        return $this->hasOne(Redeem::class, 'user_id', 'id')->where('offline_reward', 1);
    }
}
