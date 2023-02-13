<?php

namespace App\Http\Resources\ItemVariant;

use App\Http\Resources\Item\ItemResource;
use App\Http\Resources\Item\ItemSizeResource;
use App\Http\Resources\ItemBid\ItemBidHighestPriceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemVariantResource extends JsonResource
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
            'item' => new ItemResource($this->whenLoaded('item')),
            'size' => new ItemSizeResource($this->whenLoaded('size')),
            'created_at' => $this->created_at
        ];
    }
}
