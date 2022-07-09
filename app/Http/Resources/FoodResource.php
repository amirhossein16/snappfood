<?php

namespace App\Http\Resources;

use App\Models\foodCategories;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
            'foods' => FoodsResource::collection(\App\Models\Food::where('restaurant_detail_id', $this->id)->get(),),
        ];
    }
}
