<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemStockResource extends JsonResource
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
            'price_in' => number_format($this->price_in),
            'price_out' => number_format($this->price_out),
            'price' => number_format($this->price),
            'is_sale' => $this->is_sale,
            'old_price' => number_format($this->old_price),

            'stock_status' => $this->stock_status_id,
        ];
    }
}
