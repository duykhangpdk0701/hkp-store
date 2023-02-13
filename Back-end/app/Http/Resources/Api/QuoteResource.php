<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
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
            'quote_code' => $this->quote_code,
            'email' => $this->email,
            'customer' => $this->customer,
            'shipping_name' => $this->shipping_name,
            'shipping_address' => $this->shipping_address,
            'shipping_city' => $this->shippingCity ?? '',
            'shipping_district' => $this->shippingDistrict ?? '',
            'shipping_ward' => $this->shippingWard ?? '',
            'shipping_phone' => $this->shipping_phone,
            'payment_method' => $this->payment_metyhod,
            'payment_method_data' => $this->paymentMethod,
            'quote_detail' => QuoteDetailResource::collection(
                $this->whenLoaded('quoteDetails')
            ),
            'shipping_fee' => number_format( $this->shipping_fee ?? 0),
            'total_price' => number_format( $this->total_price),
            'total_discount' => number_format( $this->total_discount),
            'total_shipping' => number_format( $this->total_shipping),
            'total' => number_format( $this->total),
            'total_tax' =>  number_format($this->total_tax),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
