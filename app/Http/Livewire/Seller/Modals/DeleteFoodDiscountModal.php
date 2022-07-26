<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\Food;
use Livewire\Component;

class DeleteFoodDiscountModal extends Component
{
    public $deleteDiscountModalConfirm = false;
    public $food;
    protected $listeners = ['deleteDiscount'];

    public function deleteDiscount(Food $id)
    {
        $this->deleteDiscountModalConfirm = true;
        $this->food = $id;
    }

    public function deleteDiscountFood()
    {
        $this->food->off = 0;
        $this->food->save();
        $this->food->discountFood->delete();
        $this->emit('RefreshTable');
        $this->deleteDiscountModalConfirm = false;
        $this->emitTo('livewire-toast', 'show', " کد تخفیف با موفقیت حذف شد :) ");
    }

    public function render()
    {
        return view('livewire.seller.modals.delete-food-discount-modal');
    }
}
