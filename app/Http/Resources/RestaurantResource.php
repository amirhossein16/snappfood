<?php

namespace App\Http\Resources;

use App\Models\restaurantCategories;
use App\Models\RestaurantDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $days = ['saturday' => 1, 'sunday' => 2, 'monday' => 3, 'tuesday' => 4, 'wednesday' => 5, 'thursday' => 6, 'friday' => 7];
        $restaurantDetails = [
            'id' => $this->id,
            'name' => $this->name,
            'Type' => restaurantCategories::where('id', $this->restaurant_categories_id)->get()->first()->RestaurantType,
            'address' => new AddressResource(RestaurantDetail::findOrFail($this->id)),
            'is_open' => boolval($this->is_open),
            'image' => 'https://picsum.photos/200/300',
            'score' => floatval(4.6),
            'comments_count' => 493,
            'schedule' => $this->WeekOpeningTime->keyBy('day')->map(function ($item) {
                return [
                    'start' => $item->start,
                    'end' => $item->end
                ];
            }),
            'ShippingCost' => $this->ShippingCost,
            'phone' => $this->phone,
        ];
        collect($days)->diffKeys($restaurantDetails['schedule'])->each(function ($item, $key) use ($restaurantDetails) {
            $restaurantDetails['schedule'][$key] = null;
        });
        return $restaurantDetails;
    }
}
