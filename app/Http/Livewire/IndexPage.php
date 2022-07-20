<?php

namespace App\Http\Livewire;

use App\Models\RestaurantDetail;
use Livewire\Component;

class IndexPage extends Component
{
    public $Restaurant;

    public function RestaurantDetails()
    {
        $this->Restaurant = RestaurantDetail::where('name', '!=', null)->get();
    }

    public function render()
    {
        $this->RestaurantDetails();
        return view('livewire.index-page', [
            'Restaurant' => $this->Restaurant
        ])->layout('layouts.index');
    }
}
