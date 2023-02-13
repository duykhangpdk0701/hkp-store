<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name ?? '',
            'city_id' => $this->city_id,
            'district_id' => $this->district_id,
            'ward_id' => $this->ward_id,
            'address' => $this->address,
            'status' => $this->status,
            'parse_address_string' => $this->stringAddress()
        ];
    }
}
