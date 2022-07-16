<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderRestaurantResource extends JsonResource
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
            'name' => $this->name,
            'RestaurantType' => $this->resource->restaurantCategories->RestaurantType,
            'ShippingCost' => $this->ShippingCost,
            'phone' => $this->phone
        ];
    }
}
