<?php

namespace App\Http\Resources\Item;

use App\Http\Resources\ItemVariant\ItemVariantResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemStockCartResource extends JsonResource
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
            'variant' => new ItemVariantResource($this->whenLoaded('itemVariant')),
            'item' => $this->item,
            'size' => $this->size,
            'stock_status' => $this->stock_status_id,
            'code' => $this->code,
            'sku' => $this->sku,
            'thumbnail' => $this->item->thumbnail,
            'size_value' => $this->size_value,
            'price_in' => number_format($this->price_in),
            'price_out' => number_format($this->price_out),
            'price' => number_format($this->price),
            'stock_in_date' => $this->stock_in_date,
            'stock_in_note' => $this->stock_in_note,
            'stock_in_type' => $this->stock_in_type,
            'stock_out_date' => $this->stock_out_date,
            'stock_out_note' => $this->stock_out_note,
            'stock_out_type' => $this->stock_out_type,
            'debt_status' => $this->debt_status,
            'debt_pay_date' => $this->debt_pay_date,
            'status' => $this->status,
            'created_at' => $this->created_at
        ];
    }
}
