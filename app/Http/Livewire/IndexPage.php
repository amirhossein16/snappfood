<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Food;
use App\Models\FoodParty;
use App\Models\RestaurantDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IndexPage extends Component
{
    public $Restaurant;
    public $FoodPartys;
    public $Banner;
    public $FoodParty = [];

    public function RestaurantDetails()
    {
        if (RestaurantDetail::all()->first() != null) {
            $this->Restaurant = RestaurantDetail::where('name', '!=', null)->get();
        }

        if (FoodParty::all()->first() != null && DB::table('food_partiey')->select('food_id')->get()->first() != null) {
            $this->FoodPartys = DB::table('food_partiey')->select('food_id')->where('food_party_id', FoodParty::where('status', true)->get()->first()->id)->get();
            foreach ($this->FoodPartys as $item) {
                $this->FoodParty[] = Food::where('id', $item->food_id)->get();
            }
        }
        if (Banner::all()->first() != null) {
            $this->Banner = Banner::all('path');
        }
    }

    public function render()
    {
        $this->RestaurantDetails();
        return view('livewire.index-page', [
            'Restaurant' => $this->Restaurant,
            'FoodParty' => $this->FoodParty,
            'Banners' => $this->Banner
        ])->layout('layouts.index');
    }
}
