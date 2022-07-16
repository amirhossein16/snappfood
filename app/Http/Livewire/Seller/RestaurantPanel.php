<?php

namespace App\Http\Livewire\Seller;

use App\Models\restaurantCategories;
use App\Models\RestaurantDetail;
use App\Models\WeekOpeningTime;
use Livewire\Component;
use Livewire\WithFileUploads;

class RestaurantPanel extends Component
{
    use WithFileUploads;

    public $confirmingPanelModal = false;
    public $PanelModalEdit = false;
    public $confirming = false;
    public $restaurantDet;
    public $Restaurant;
    public $lat;
    public $log;
    public $photo;
    public $time;
    public $opening;
    protected $listeners = ['saveLocation', 'setSchedule'];

    public function setSchedule($schedule)
    {
        $this->time = collect($schedule)->filter(function ($value) {
            if (isset($value['end']))
                return $value['start'] != null && $value['end'] != null;
        })->toArray();
    }

    public function open()
    {
        $open = RestaurantDetail::where('user_id', auth()->user()->id)->get()->first();
        $open->is_open ? $open->is_open = false : $open->is_open = true;
        $this->opening = $open->is_open;
        $open->save();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'وضعیت رستوران با موفقیت بروزرسانی شد :)'
        ]);
    }

    public function saveLocation($lat, $long)
    {
        $this->lat = $lat;
        $this->log = $long;
    }

    public function mount()
    {
        $this->confirmingPanelModal = true;
        $this->Restaurant = RestaurantDetail::where('user_id', '=', auth()->user()->id)->get()->first();
        $this->opening = $this->Restaurant->is_open;
//        $this->photo =
    }

    protected $rules = [
        'Restaurant.name' => 'required|min:2',
        'Restaurant.address' => 'required',
        'Restaurant.phone' => 'required',
        'Restaurant.ShippingCost' => 'required',
        'Restaurant.restaurant_categories_id' => 'required',
        'photo' => 'image|mimes:png,jpg|max:102400', // 12MB Max
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
        collect($this->time)->map(function ($value, $key) {
            $this->Restaurant->WeekOpeningTime()->where('day', $key)->updateOrCreate(
                ['day' => $key], ['start' => $value['start'], 'end' => $value['end']]
            );
        });
        $this->Restaurant->WeekOpeningTime()->whereNotIn('day', collect($this->time)->keys())->forceDelete();
        $this->validate();
        $filename = now()->timestamp . '-' . $this->Restaurant->name . '.' . $this->photo->extension();
        $this->photo->storeAs('photos/Restaurant', $filename);
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
