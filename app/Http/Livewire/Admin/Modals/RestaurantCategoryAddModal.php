<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\restaurantCategories;
use Livewire\Component;

class RestaurantCategoryAddModal extends Component
{
    public $restaurantCategory;
    public $confirmingCategoryUpdate = false;
    protected $listeners = ['confirmCategoryAdd'];

    protected $rules = [
        'restaurantCategory.RestaurantType' => 'required|min:3'
    ];

    public function confirmCategoryAdd()
    {
        $this->reset(['restaurantCategory']);
        $this->confirmingCategoryUpdate = true;
    }

    public function saveCategory()
    {
        $this->validate();

        restaurantCategories::create([
            'RestaurantType' => $this->restaurantCategory['RestaurantType'],
        ]);
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت اضافه شد :)'
        ]);

        $this->emit('RefreshTable');
        $this->confirmingCategoryUpdate = false;
    }

    public function render()
    {
        return view('livewire.admin.modals.restaurant-category-add-modal');
    }
}
