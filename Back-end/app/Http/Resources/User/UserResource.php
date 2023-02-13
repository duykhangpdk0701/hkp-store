<?php

namespace App\Http\Resources\User;

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
        $permissions = [];
        $roles = [];
        if ($this->relationLoaded('roles')) {
            $roles = array_map(
                function ($role) {
                    return $role['name'];
                },
                $this->roles->toArray()
            );
        }
        if ($this->relationLoaded('permissions')) {
            $permissions = array_map(
                function ($permission) {
                    return $permission['name'];
                },
                $this->getAllPermissions()->toArray()
            );
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'token' => $this->token,
            'roles' => $this->whenLoaded('roles', $this->roles),
            'permissions' => $permissions,
            'role' => $this->whenLoaded('roles', $this->roles->first()->name),
            'partner_status' => $this->userProfile ? $this->userProfile->active_status : '',
            'avatar' => $this->avatar,
            'reset_password_at' => $this->reset_password_at,
            'user_profile' => new UserProfileResource($this->userProfile),
            'created_at' => $this->created_at
        ];
    }
}
