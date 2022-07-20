<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\Food;
use Livewire\Component;

class FoodEditModal extends Component
{
    public $confirmingfoodEditModal = false;
    public $food;
    protected $listeners = ['EditModalConfirm'];


    protected $rules = [
        'food.title' => 'required|min:3',
        'food.price' => 'required|min:3',
        'food.food_categories_id' => 'required',
        'food.raw_material' => 'required'
    ];

    public function EditModalConfirm(Food $id)
    {
        $this->resetErrorBag();
        $this->food = $id;
        $this->confirmingfoodEditModal = true;
    }

    public function editFood()
    {
        $this->validate();
        if (isset($this->food->id)) {
            $this->food->save();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت بروزرسانی شد :)'
            ]);
        }
        $this->emit('reloadFoodTable');
        $this->confirmingfoodEditModal = false;
    }

    public function render()
    {
        return view('livewire.seller.modals.food-edit-modal');
    }
}
