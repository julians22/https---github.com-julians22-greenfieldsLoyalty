<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use BinaryCats\Sku\HasSku;
use BinaryCats\Sku\Concerns\SkuOptions;
use Illuminate\Database\Eloquent\Model;

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
}
