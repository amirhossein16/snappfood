<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\Food;
use Livewire\Component;

class FoodAddModal extends Component
{
    public $food;

    protected $listeners = ['confirmFoodAdd'];
    public $confirmingfoodAddModal = false;

    protected $rules = [
        'food.title' => 'required|min:3',
        'food.price' => 'required|min:3',
        'food.food_categories_id' => 'required',
        'food.raw_material' => 'required'
    ];

    public function confirmFoodAdd()
    {
        $this->reset(['food']);
        $this->confirmingfoodAddModal = true;
    }

    public function saveFood()
    {
        $this->validate();
            Food::create([
                "food_categories_id" => $this->food['food_categories_id'],
                "price" => $this->food['price'],
                "raw_material" => $this->food['raw_material'],
                "title" => $this->food['title'],
                'restaurant_detail_id' => \auth()->user()->restaurantDetail->id,
            ]);
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت اضافه شد :)'
            ]);
        $this->emit('reloadFoodTable');
        $this->confirmingfoodAddModal = false;
    }

    public function render()
    {
        return view('livewire.seller.modals.food-add-modal');
    }
}
