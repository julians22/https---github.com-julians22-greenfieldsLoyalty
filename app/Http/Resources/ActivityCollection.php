<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivityCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'kode' => $this->transaction_code,
            'tanggal_trans' => $this->date,
            'activity' => $this->activity,
            'status' => $this->status,
            'type_transaksi' => $this->type
        ];
    }
}
