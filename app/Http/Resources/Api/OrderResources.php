<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\Api\Auth\CustomerResources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'ref_id' => $this->ref_id,
            'order_type' => $this->order_type,
            'payment_type' => $this->payment_type,
            'coupon_id' => $this->coupon_id,
            'status' => $this->status,
            'subtotal' => $this->subtotal,
            'discount' => $this->discount,
            'total' => $this->total,
            'customer'=> new CustomerResources($this->customer) ?? null,
            'details' => OrderDetailsResources::collection($this->detailsOrders) ?? null,
            'order_status' => OrderStatusResources::collection($this->statusOrders) ?? null,
            'create_dates' => [
                'created_at_human' => $this->created_at->diffForHumans(),
                'created_at' => $this->created_at
            ],
            'update_dates' => [
                'updated_at_human' => $this->updated_at->diffForHumans(),
                'updated_at' => $this->updated_at
            ],
        ];
    }
}
