<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
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
            'file_name' => $this->name,
            'url' => $this->getUrl(),
            'full_url' => $this->getFullUrl(),
            'path' => $this->getPath(),
            'order_column' => $this->order_column
        ];
    }
}
