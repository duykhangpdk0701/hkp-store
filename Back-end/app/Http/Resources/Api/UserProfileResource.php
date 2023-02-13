<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
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
            'user_id' => $this->user_id,
            'phone' => $this->phone,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'identify_number' => $this->identify_number,
            'bank_number' => $this->bank_number,
            'bank_name' => $this->bank_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
