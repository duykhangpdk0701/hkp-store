<?php

namespace App\Http\Resources\Item;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'sku' => $this->sku,
            'thumbnail_url' => $this->thumbnail,
            'is_featured' => $this->is_featured,
            'media_type' => $this->media_type,
            'status' => $this->status,
            'created_at' => $this->created_at
        ];
    }
}
