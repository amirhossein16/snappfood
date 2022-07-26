<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\foodCategories;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FoodCategoryAddModal extends Component
{
    public $foodCategory;
    public $confirmingCategoryAdd;
    protected $listeners = ['confirmCategoryAdd'];


    protected $rules = [
        'foodCategory.FoodType' => 'required|min:3'
    ];

    public function confirmCategoryAdd()
    {
        $this->reset(['foodCategory']);
        $this->confirmingCategoryAdd = true;
    }


    public function saveCategory()
    {
        $this->validate();

        foodCategories::create([
            'FoodType' => $this->foodCategory['FoodType'],
        ]);
        $this->reset(['foodCategory']);
        $this->emit('RefreshTable');
        $this->emitTo('livewire-toast', 'show', " دسته بندی با موفقیت اضافه شد :)");
        $this->confirmingCategoryAdd = false;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.admin.modals.food-category-add-modal');
    }
}
