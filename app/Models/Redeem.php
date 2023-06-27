<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use BinaryCats\Sku\HasSku;
use BinaryCats\Sku\Concerns\SkuOptions;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Redeem extends Model
{
    use HasSku;

    const STATUS_SUCCESS = 'success';
    const STATUS_SEND = 'send';
    const STATUS_PROCESS = 'process';
    const STATUS_FAILED = 'failed';
    const STATUS_CREATED = 'created';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['success_at', 'failed_at', 'process_at', 'send_at'];

    /**
     * @var string[]
     */
    protected $with = [
        'user',
        'reward',
        'address'
    ];

    /**
     * Get the options for generating the Sku.
     *
     * @return BinaryCats\Sku\SkuOptions
     */
    public function skuOptions() : SkuOptions
    {
        return SkuOptions::make()
            ->target('transaction_code')
            ->using('TH_')
            ->forceUnique(false)
            ->generateOnCreate(true)
            ->refreshOnUpdate(false);
    }

    /**
     * Get the user associated with the TopUp
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get the reward associated with the Redeem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reward(): HasOne
    {
        return $this->hasOne(Reward::class, 'id', 'reward_id')->withTrashed();
    }

    /**
     * Get the address associated with the Redeem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address(): HasOne
    {
        return $this->hasOne(UserAddress::class, 'id', 'address_id');
    }

    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(function ($query) use ($term) {
            $query->where('transaction_code', 'like', '%'.$term.'%');
        });
    }

    public function isCompleted()
    {
        return $this->status == self::STATUS_SUCCESS;
    }

    public function isCreated()
    {
        return $this->status == self::STATUS_CREATED;
    }

    public function isSend()
    {
        return $this->status == self::STATUS_SEND;
    }

    public function isProcessed()
    {
        return $this->status == self::STATUS_PROCESS;
    }

    public function isFailed()
    {
        return $this->status == self::STATUS_FAILED;
    }

    /**
     * Scope a query to only include created status
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatusCreated($query)
    {
        return $query->where('status', self::STATUS_CREATED);
    }
}
