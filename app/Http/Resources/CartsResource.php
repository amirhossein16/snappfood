<?php

namespace App\Http\Resources;

use App\Models\Food;
use App\Models\RestaurantDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class CartsResource extends JsonResource
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
            'restaurant' => CartRestaurantResource::collection(RestaurantDetail::where('id', $this->cart->restaurant_detail_id)->get()),
            'foods' => CartFoodResource::collection(Food::where('id', $this->food->id)->get()),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
