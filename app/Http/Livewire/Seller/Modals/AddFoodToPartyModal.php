<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\Food;
use App\Models\FoodParty;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddFoodToPartyModal extends Component
{
    public $foods;
    public $discount = [];
    public $confirmFoodAddToPartyModal = false;
    protected $listeners = ['confirmFoodAddToParty'];

    protected $rules = [
        'discount.foodPrties' => 'required|string',
        'discount.amount' => 'required|integer'
    ];

    public function confirmFoodAddToParty()
    {
        $this->confirmFoodAddToPartyModal = true;
    }

    public function AddFoodToParty()
    {
        foreach ($this->discount['foodPrties'] as $foodPrty) {
            DB::table('food_partiey')->insert([
                'food_id' => $foodPrty,
                'food_party_id' => FoodParty::where('status', true)->get()->first()->id,
                'DiscountAmount' => $this->discount['amount']
            ]);
        }

        $this->emitTo('livewire-toast', 'show', "با موفقیت به فودپارتی افزوده شد :) ");
        $this->emit('RefreshTable');
        $this->confirmFoodAddToPartyModal = false;
    }

    public function render()
    {
        $this->foods = Food::where('restaurant_detail_id', auth()->user()->restaurantDetail->id)->get();
        return view('livewire.seller.modals.add-food-to-party-modal', [
            'foods' => $this->foods
        ]);
    }
}
