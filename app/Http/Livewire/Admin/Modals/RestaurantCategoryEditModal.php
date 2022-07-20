<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\restaurantCategories;
use Livewire\Component;

class RestaurantCategoryEditModal extends Component
{
    public $confirmingCategoryUpdate;
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
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت بروزرسانی شد :)'
            ]);
        }
        $this->emit('refreshTable');
        $this->confirmingCategoryUpdate = false;
    }
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.modals.restaurant-category-edit-modal');
    }
}
