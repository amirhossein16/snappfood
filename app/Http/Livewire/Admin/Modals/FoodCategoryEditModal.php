<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\foodCategories;
use Livewire\Component;

class FoodCategoryEditModal extends Component
{
    public $foodCategory;
    public $confirmingCategoryUpdate;

    protected $listeners = ['EditModalConfirm'];

    protected $rules = [
        'foodCategory.FoodType' => 'required|min:3'
    ];

    public function EditModalConfirm(foodCategories $id)
    {
        $this->confirmingCategoryUpdate = true;
        $this->foodCategory = $id;
    }

    public function editModal()
    {
        $this->validate();

        if (isset($this->foodCategory->id)) {
            $this->foodCategory->save();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت بروزرسانی شد :)'
            ]);
        }

        $this->reset(['foodCategory']);
        $this->emit('refreshFoodTable');
        $this->confirmingCategoryUpdate = false;
    }

    public
    function render()
    {
        return view('livewire.admin.modals.food-category-edit-modal');
    }
}
