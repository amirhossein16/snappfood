<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'restaurant' => new OrderRestaurantResource($this->cart->restaurantDetail),
//            'foods' => new FoodResource($this->resource->cart->cartFood),
            'cartState' => $this->cart->state,
            'name' => $this->cart->user->name,
            'email' => $this->cart->user->email,
            'Total_price' => (int)$this->Total_price,
            'OrderStatus' => $this->OrderStatus,
        ];
    }
}
