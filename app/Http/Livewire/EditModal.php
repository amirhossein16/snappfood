<?php

namespace App\Http\Livewire;

use App\Models\restaurantCategories;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditModal extends ModalComponent
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
        } else {
            restaurantCategories::create([
                'RestaurantType' => $this->restaurantCategory['RestaurantType'],
            ]);
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت اضافه شد :)'
            ]);
        }
        $this->emit('refreshTable');
        $this->confirmingCategoryUpdate = false;
    }
    public function render()
    {
        return view('livewire.edit-modal');
    }
}
