<?php

namespace App\Http\Resources\Api;

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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'token' => $this->token,
            'roles' => array_map(
                function ($role) {
                    return $role['name'];
                },
                $this->roles->toArray()
            ),
            'permissions' => array_map(
                function ($permission) {
                    return $permission['name'];
                },
                $this->getAllPermissions()->toArray()
            ),
            'role' => isset($this->roles[0]) ? $this->roles[0]->name : '',
            'avatar' => $this->avatar,
            'reset_password_at' => $this->reset_password_at,
            'profile' => new UserProfileResource($this->userProfile),
            'multiple_address' => AddressResource::collection($this->addresses),
            'address_default' => new AddressResource($this->getAddressApplied())
        ];
    }
}
