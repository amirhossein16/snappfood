<?php

namespace App\Http\Livewire\Seller\Modals;

use Livewire\Component;

class RestaurantLocationModal extends Component
{
    public $confirmRestaurantLocationModal = false;
    public $lat;
    public $long;
    protected $listeners = ['OpenLocationModal', 'saveLocation'];

    protected $rules = ['lat' => 'required', 'long' => 'required'];

    public function saveLocation($lat, $long)
    {
        $this->lat = $lat;
        $this->long = $long;
    }

    public function OpenLocationModal()
    {
        $this->confirmRestaurantLocationModal = true;
    }

    public function EditLocation()
    {
        $this->validate();
        auth()->user()->restaurantDetail->lat = $this->lat;
        auth()->user()->restaurantDetail->long = $this->long;
        auth()->user()->restaurantDetail->save();
        $this->confirmRestaurantLocationModal = false;
        $this->emitTo('livewire-toast', 'show', 'اطلاعات موقعیت مکانی با موفقیت بروز شد :)');
    }

    public function render()
    {
        return view('livewire.seller.modals.restaurant-location-modal');
    }
}
