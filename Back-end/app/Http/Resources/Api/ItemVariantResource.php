<?php

namespace App\Http\Resources\Api;

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
        $lowestPrice = null;

        if ($this->relationLoaded('itemStocks')) {
            $lowestPrice = $this->itemStocks->first() ? number_format($this->itemStocks->first()->price) : null;
        }

        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'item_id' => $this->item_id,
            'item' => new ItemResource($this->whenLoaded('item')),
            'size_id' => $this->size_id,
            'size' => new ItemSizeResource($this->whenLoaded('size')),
            'color_id' => $this->color_id,
            'color' => new ItemColorResource($this->whenLoaded('color')),
            'lowest_price' => $this->when($this->whenLoaded('itemStocks'), $lowestPrice),
            'lowest_in_stock_item_stock' => new ItemStockResource($this->whenLoaded('lowestInStockItemStock')),
            'latest_sale' => new OrderItemResource($this->whenLoaded('latestSale')),
            'status' => $this->status
        ];
    }
}
