<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\DiscountFood;
use App\Models\Food;
use Livewire\Component;

class FoodDiscountEditModal extends Component
{
    public $food;
    public $discount;
    public $confirmingEditDiscountModal = false;
    protected $listeners = ['confirmEditDiscount'];

    public function confirmEditDiscount(Food $id)
    {
        $this->resetErrorBag();
        $this->confirmingEditDiscountModal = true;
        $this->food = $id;
    }

    public function editDiscount()
    {
        if (isset($this->food->id)) {
            $this->food->save();

            $dis = DiscountFood::where('food_id', '=', $this->food->id)->get()[0];
            $dis->discount_id = $this->discount['id'];
            $dis->save();
            $this->emitTo('livewire-toast', 'show', " کد تخفیف با موفقیت ّروزرسانی شد :) ");
        }
        $this->emit('RefreshTable');
        $this->confirmingEditDiscountModal = false;
    }

    public function render()
    {
        return view('livewire.seller.modals.food-discount-edit-modal');
    }
}
