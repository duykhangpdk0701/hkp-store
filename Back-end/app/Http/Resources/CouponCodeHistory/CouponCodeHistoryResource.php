<?php

namespace App\Http\Resources\CouponCodeHistory;

use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponCodeHistoryResource extends JsonResource
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
            'order' => $this->orderDetail ? $this->when(
                $this->relationLoaded('orderDetail') &&
                    $this->orderDetail->relationLoaded('order'),
                function () {
                    return new OrderResource($this->orderDetail->order);
                }
            ) : '',
            'customer' => new UserResource($this->whenLoaded('customer')),
            'created_at' => date_format($this->created_at, "d-m-Y H:i:s"),
            'updated_at' => date_format($this->updated_at, "d-m-Y H:i:s"),
        ];
    }
}
