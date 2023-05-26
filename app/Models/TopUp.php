<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use BinaryCats\Sku\HasSku;
use BinaryCats\Sku\Concerns\SkuOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TopUp extends Model
{
    use HasFactory, HasSku;

    const STATUS_SUCCESS = 'success';
    const STATUS__SEND = 'send';
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
    protected $dates = ['success_at', 'failed_at', 'process_at'];

    /**
     * Get the options for generating the Sku.
     *
     * @return BinaryCats\Sku\SkuOptions
     */
    public function skuOptions() : SkuOptions
    {
        return SkuOptions::make()
            ->target('transaction_code')
            ->using('TU_')
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

    public function isProcessed()
    {
        return $this->status == self::STATUS_PROCESS;
    }

    public function isFailed()
    {
        return $this->status == self::STATUS_FAILED;
    }
}
