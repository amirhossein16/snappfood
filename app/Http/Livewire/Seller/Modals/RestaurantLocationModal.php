<?php

namespace App\Http\Livewire\Seller\Modals;

use Livewire\Component;

class RestaurantLocationModal extends Component
{
    public $latitude;
    public $longitude;
    public $confirmRestaurantLocationModal = false;
    protected $listeners = ['OpenLocationModal', 'saveLocation'];

    protected $rules = ['latitude' => 'required', 'longitude' => 'required'];

    public function saveLocation($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function OpenLocationModal()
    {
        $this->confirmRestaurantLocationModal = true;
    }

    public function EditLocation()
    {
        $this->validate();

        auth()->user()->restaurantDetail->latitude = $this->latitude;
        auth()->user()->restaurantDetail->longitude = $this->longitude;
        auth()->user()->restaurantDetail->save();

        $this->confirmRestaurantLocationModal = false;
        $this->emitTo('livewire-toast', 'show', 'اطلاعات موقعیت مکانی با موفقیت بروز شد :)');
    }

    public function render()
    {
        return view('livewire.seller.modals.restaurant-location-modal');
    }
}
