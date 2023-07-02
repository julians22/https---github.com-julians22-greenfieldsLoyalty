<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class RedeemResource extends JsonResource
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
            "transaction_code" => $this->transaction_code,
            "user_id" => $this->transaction_code,
            "point" => $this->point,
            "status" => $this->status,
            "redeem_date" => $this->created_at->format('d-m-Y h:i:s'),
            "reward" => new RewardResource($this->reward)
        ];
    }
}
