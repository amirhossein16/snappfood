<?php

namespace App\Http\Resources;

use App\Models\foodCategories;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodsResource extends JsonResource
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
            'title' => foodCategories::where('id', $this->food_categories_id)->get()->first()->FoodType,
            'price' => $this->price,
            'raw_material' => $this->raw_material,
            'off' => $this->off,
            'image' => 'https://picsum.photos/200/300'
        ];
    }
}
