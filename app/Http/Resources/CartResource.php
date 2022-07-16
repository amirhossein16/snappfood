<?php

namespace App\Http\Resources;

use App\Models\Cart;
use App\Models\CartFood;
use App\Models\Food;
use App\Models\RestaurantDetail;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CartResource extends JsonResource
{
    public int $foodCount;

    public function computingFoodCount($value): static
    {
        $this->foodCount = $value;
        return $this;
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        $this->computingFoodCount(CartFood::where('cart_id', $this->resource->id)->get()->first()->count);
        return [
            'id' => $this->id,
            'restaurant' => CartRestaurantResource::collection(RestaurantDetail::where('id', $this->restaurant_detail_id)->get()),
            'foods' => CartFoodResource::collection(CartFood::where('cart_id', $this->id)->get())
            ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
