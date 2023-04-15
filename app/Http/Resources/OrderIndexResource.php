<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderIndexResource extends JsonResource
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
            "id" => $this->id,
            "user_id" => $this->user->id,
            "items" => [
                "product_id" => $this->product_id,
                "quantity" => $this->quantity,
                "product_price" => $this->product_price,
                "total" => $this->total
            ],
            "items_detail" => new OrderProductResource($this->product)
        ];
    }
}
