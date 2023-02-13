<?php

namespace App\Http\Resources\OrderItem;

use App\Http\Resources\ItemVariant\ItemVariantResource;
use App\Models\OrderStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'sku' => $this->sku,
            'code' => $this->code,
            'order' => $this->order,
            'item' => $this->item,
            'thumbnail' => $this->item->thumbnail ?? '',
            'variant' => new ItemVariantResource($this->variant),
            'item_stock' => $this->itemStock,
            'supplier' => $this->supplier,
            'size_value' => $this->size_value,
            'order_status_value' => $this->itemStock->debt_status !== 0 ?
                collect(OrderStatus::$orderStatusList)
                    ->where('id', $this->order->order_status_id)->first()['name']
                : ORDER_STT_CANCELED,
            'size_locale' => $this->variant->size->itemSizeLocale ?? '',
            'profit_rate' => number_format($this->supplier->userProfile->profit_rate ?? 0),
            'price_in' => number_format($this->price_in ?? 0),
            'price' => number_format($this->price ?? 0),
            'total' => number_format($this->total ?? 0),
            'quantity' => $this->quantity,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
