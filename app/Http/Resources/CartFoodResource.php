<?php

namespace App\Http\Resources;

use App\Models\Cart;
use App\Models\CartFood;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CartFoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->Food->id,
            'title' => $this->Food->title,
            'price' => $this->Food->price,
            'count' => $this->count
        ];
    }
}
