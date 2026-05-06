<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
        'client_id' => $this->client_id,
        'order_date' => $this->order_date,
        'subtotal' => $this->subtotal,
        'tax' => $this->tax,
        'total' => $this->total,
        'status' => $this->status,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        'client' => $this->whenLoaded('client'),
        'products' => $this->whenLoaded('products'),
    ];
}
}
