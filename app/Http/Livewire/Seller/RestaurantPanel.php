<?php

namespace App\Http\Livewire\Seller;

use App\Models\restaurantCategories;
use App\Models\RestaurantDetail;
use Livewire\Component;

class RestaurantPanel extends Component
{
    public $confirmingPanelModal = false;
    public $PanelModalEdit = false;
    public $confirming = false;
    public $restaurantDet;
    public $Restaurant;
    public $lat;
    public $log;
    protected $listeners = ['saveLocation'];

    public function saveLocation($lat, $long)
    {
        $this->lat = $lat;
        $this->log = $long;
    }

    public function mount()
    {
        $this->confirmingPanelModal = true;
        $this->Restaurant = RestaurantDetail::where('user_id', '=', auth()->user()->id)->get()->first();
    }

    protected $rules = [
        'Restaurant.name' => 'required|min:2',
        'Restaurant.address' => 'required',
        'Restaurant.phone' => 'required',
        'Restaurant.ShippingCost' => 'required',
        'Restaurant.restaurant_categories_id' => 'required',
    ];


    public function CompleteModal(RestaurantDetail $id)
    {
        $this->resetErrorBag();
        $this->reset(['Restaurant']);
        $this->restaurantDet = $id;
        $this->PanelModalEdit = true;
    }

    public function saveRestaurant()
    {
        $this->Restaurant->lat = $this->lat;
        $this->Restaurant->long = $this->log;
        $this->validate();
        if (isset($this->Restaurant->id)) {
            $this->Restaurant->save();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'اطلاعات رستوران با موفقیت بروزرسانی شد :)'
            ]);
        }
    }

    public function render()
    {
        $RestaurantCategory = restaurantCategories::all();
        $restaurantOwn = RestaurantDetail::where('user_id', '=', auth()->user()->id)->get();
        return view('livewire.seller.restaurant-panel', [
            'categories' => $RestaurantCategory,
            'detail' => $restaurantOwn
        ]);
    }
}
