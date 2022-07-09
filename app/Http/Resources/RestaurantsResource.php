<?php

namespace App\Http\Resources;

use App\Models\restaurantCategories;
use App\Models\RestaurantDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantsResource extends JsonResource
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
            'name' => $this->name,
            'Type' => restaurantCategories::where('id', $this->restaurant_categories_id)->get()->first()->RestaurantType,
            'address' => new AddressResource(RestaurantDetail::findOrFail($this->id)),
            'is_open' => boolval($this->is_open),
            'image' => 'https://picsum.photos/200/300',
            'score' => floatval(4.6),
        ];
    }
}
