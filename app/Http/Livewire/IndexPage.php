<?php

namespace App\Http\Livewire;

use App\Models\Food;
use App\Models\FoodParty;
use App\Models\RestaurantDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IndexPage extends Component
{
    public $Restaurant;
    public $FoodPartys;
    public $FoodParty=[];

    public function RestaurantDetails()
    {
        $this->Restaurant = RestaurantDetail::where('name', '!=', null)->get();
        $this->FoodPartys = DB::table('food_partiey')->select('food_id')->where('food_party_id', FoodParty::where('status', true)->get()->first()->id)->get();
        foreach ($this->FoodPartys as $item) {
            $this->FoodParty[] = Food::where('id', $item->food_id)->get();
        }
    }

    public function render()
    {
        $this->RestaurantDetails();
        return view('livewire.index-page', [
            'Restaurant' => $this->Restaurant,
            'FoodParty' => $this->FoodParty,
        ])->layout('layouts.index');
    }
}
