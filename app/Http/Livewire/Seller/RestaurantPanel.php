<?php

namespace App\Http\Livewire\Seller;

use App\Models\restaurantCategories;
use App\Models\RestaurantDetail;
use App\Models\WeekOpeningTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithFileUploads;

class RestaurantPanel extends Component
{
    public $confirmingPanelModal = false;
    public $PanelModalEdit = false;
    public $confirming = false;
    public $restaurantDet;
    public $Restaurant;
    public $opening;

    public function open()
    {
        $open = RestaurantDetail::where('user_id', auth()->user()->id)->get()->first();

        $open->is_open ? $open->is_open = false : $open->is_open = true;
        $this->opening = $open->is_open;
        $open->save();

        $this->emitTo('livewire-toast', 'show', 'وضعیت فروشگاه با موفقیت تغییر کرد :)');

    }

    public function mount()
    {
        $this->confirmingPanelModal = true;
        $this->confirminglocationModal = true;

        $this->Restaurant = RestaurantDetail::where('user_id', '=', auth()->user()->id)->get()->first();

        $this->opening = $this->Restaurant->is_open;
    }

    protected $rules = [
        'Restaurant.name' => 'required|min:2',
        'Restaurant.address' => 'required',
        'Restaurant.phone' => 'required',
        'Restaurant.ShippingCost' => 'required',
        'Restaurant.accountNumber' => 'required',
        'Restaurant.restaurant_categories_id' => 'required',
    ];

    protected $messages = [
        'Restaurant.name.required' => 'نام رستوران نمیتواند خالی باشد !',
        'Restaurant.name.min' => 'نام رستوران حداقل دو حرف باید باشد !',
        'Restaurant.address.required' => 'آدرس رستوران نمیتواند خالی باشد !',
        'Restaurant.phone.required' => 'شماره تماس رستوران نمیتواند خالی باشد !',
        'Restaurant.ShippingCost.required' => 'هزینه ارسال رستوران نمیتواند خالی باشد !',
        'Restaurant.accountNumber.required' => 'شماره حساب رستوران نمیتواند خالی باشد !',
        'Restaurant.restaurant_categories_id.required' => 'دسته بندی رستوران نمیتواند خالی باشد !',
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
        $this->validate();

        if (isset($this->Restaurant->id)) {
            $this->Restaurant->save();
            $this->emitTo('livewire-toast', 'show', 'اطلاعات با موفقیت بروز شد :)');
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
