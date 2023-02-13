<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\User\UserResource;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_code' => $this->order_code ?? '',
            'store_id' => $this->store_id,
            'customer' => new UserResource($this->whenLoaded('customer')),
            'shipping_name' => $this->shipping_name,
            'shipping_generate_address' => $this->shippingAddress(),
            'shipping_address' => $this->shipping_address,
            'shipping_country_id' => $this->shipping_country_id,
            'shipping_city_id' => $this->shipping_city_id,
            'shipping_district_id' => $this->shipping_district_id,
            'shipping_ward_id' => $this->shipping_ward_id,
            'shipping_street' => $this->shipping_street,
            'shipping_phone' => $this->shipping_phone,
            'shipping_taxcode' => $this->shipping_taxcode,
            'payment_method' => $this->paymentMethod->name ?? '',
            'payment_code' => $this->payment_code,
            'payment_fee' => $this->payment_fee,
            'payment_fee_type' => $this->payment_fee_type,
            'shipper_id' => $this->shipper_id,
            'total_price' => number_format($this->total_price),
            'total_discount' => number_format($this->total_discount),
            'total_tax' => number_format($this->total_tax),
            'total_shipping' => number_format($this->total_shipping),
            'total_payment_fee' => number_format($this->total_payment_fee),
            'total' => number_format($this->total),
            'grand_total'  => number_format($this->grand_total),
            'order_status_id' => $this->order_status_id,
            'order_status_value' => __('general.order_status.' . collect(OrderStatus::$orderStatusList)->where('id', $this->order_status_id)->first()['id']),
            'number_order_items' => $this->num_orderItems,
            'coupon' => $this->orderDetails->pluck('coupon_code'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'uuid' => $this->uuid,
        ];
    }
}
