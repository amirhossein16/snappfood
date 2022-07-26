<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\restaurantCategories;
use Livewire\Component;

class RestaurantCategoryEditModal extends Component
{
    public $confirmingCategoryUpdate = false;
    public $restaurantCategory;
    protected $listeners = ['EditModalConfirm'];


    protected $rules = [
        'restaurantCategory.RestaurantType' => 'required|min:3'
    ];

    public function EditModalConfirm(restaurantCategories $id)
    {
        $this->confirmingCategoryUpdate = true;
        $this->restaurantCategory = $id;
    }

    public function saveCategory()
    {
        $this->validate();

        if (isset($this->restaurantCategory->id)) {
            $this->restaurantCategory->save();
        }
        $this->emit('RefreshTable');
        $this->emitTo('livewire-toast', 'show', 'دسته بندی با موفقیت بروزرسانی شد :)');
        $this->confirmingCategoryUpdate = false;
    }

    public function render()
    {
        return view('livewire.admin.modals.restaurant-category-edit-modal');
    }
}
