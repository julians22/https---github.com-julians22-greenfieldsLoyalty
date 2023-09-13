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
        // dd($this->address_data->hasProvince());
        return [
            'name' => $this->name,
            'email' => $this->email,
            'no_hp' => $this->phone,
            'alamat' => $this->isHasAddressData() ? $this->address_data->address : null,
            'domicile' => $this->isHasAddressData() ? $this->address_data->domicile : null,
            'provinsi' =>  $this->isHasProvince() ? $this->address_data->rel_province : null,
            'kota' =>  $this->isHasCity() ? $this->address_data->rel_city : null,
            'kecamatan' =>  $this->isHasDistrict() ? $this->address_data->rel_district : null,
            'created_at' => $this->created_at->format('Y-m-d h:i:s'),
            'related_voucher' => $this->voucher ? $this->voucher->code : 'Voucher Tidak Ditemukan',
            'register_channel' => $this->register_channel
        ];
    }
}
