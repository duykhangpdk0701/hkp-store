<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemColorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $stock = null;

        if ($this->relationLoaded('itemStocks')) {
            $stock = $this->itemStocks->first();
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'value' => $this->value,
            'lowest_price' => $this->whenLoaded('itemStocks', $stock ? number_format($stock->price) : null),
            'variants' => ItemVariantResource::collection($this->whenLoaded('itemVariants'))
        ];
    }
}
