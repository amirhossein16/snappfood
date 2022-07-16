<?php

namespace App\Http\Resources;

use App\Models\Discount;
use App\Models\DiscountFood;
use App\Models\foodCategories;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodsResource extends JsonResource
{
    public string $type;
    public int $amount;

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
            'Price' => $this->price,
            'PriceWithDiscount' => $this->when($this->off, function () {
                $discountId = DiscountFood::where('food_id', $this->id)->get()->first()->discount_id;
                $type = Discount::where('id', $discountId)->get()->first()->type;
                $amount = Discount::where('id', $discountId)->get()->first()->amount;
                if ($type == "Price") {
                    return $this->price -= $amount;
                } elseif ($type == 'Percentage') {
                    return ($this->price * (100 - $amount)) / 100;
                }
            }),
            'raw_material' => $this->raw_material,
            'off' => $this->off,
            'image' => 'https://picsum.photos/200/300'
        ];
    }
}
