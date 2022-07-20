<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\DiscountFood;
use App\Models\Food;
use Livewire\Component;

class FoodDiscountAddModal extends Component
{
    public $food;
    public $discount;
    public $confirmAddDiscountModal = false;
    protected $listeners = ['confirmAddDiscount'];

    public $rules = [
        'food.title' => 'required',
        'discount.id' => 'required'
    ];

    public function confirmAddDiscount(Food $id)
    {
        $this->resetErrorBag();
        $this->confirmAddDiscountModal = true;
        $this->food = $id;
    }

    public function addDiscount()
    {
        $this->validate();

        DiscountFood::create([
            'food_id' => $this->food->id,
            'discount_id' => $this->discount['id']
        ]);
        $discountAdd = Food::find($this->food->id);
        if ($discountAdd->off === null) {
            $discountAdd->off = true;
            $discountAdd->save();
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت اضافه شد :)'
        ]);
        $this->emit('reloadFoodTable');
        $this->confirmAddDiscountModal = false;
    }

    public function render()
    {
        return view('livewire.seller.modals.food-discount-add-modal');
    }
}
