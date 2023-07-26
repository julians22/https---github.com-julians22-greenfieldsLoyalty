<?php

namespace App\Http\Resources\Api\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'no_hp' => $this->phone,
            'alamat' => $this->address_data ?? $this->address_data->address,
            'provinsi' => $this->address_data ?? $this->address_data->rel_province->name,
            'kota' => $this->address_data ?? $this->address_data->rel_city ? $this->address_data->rel_city->name : null,
            'kecamatan' => $this->address_data ?? $this->address_data->rel_district ? $this->address_data->rel_district->name : null,
            'created_at' => $this->created_at->format('Y-m-d h:i:s'),
            'related_voucher' => $this->voucher ? $this->voucher->code : 'Voucher Tidak Ditemukan'
        ];
    }
}
