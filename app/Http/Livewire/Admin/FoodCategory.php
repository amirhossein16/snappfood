<?php

namespace App\Http\Livewire\Admin;

use App\Models\foodCategories;
use Livewire\Component;

class FoodCategory extends Component
{
    public $foodCategory;
    public $confirmingCategoryDeletion = false;
    public $confirmingCategoryUpdate = false;
    protected $listeners = ['RefreshTable' => 'refreshFoodTable'];

    public function confirmCategoryEdit(foodCategories $id)
    {
        $this->resetErrorBag();
        $this->foodCategory = $id;
        $this->confirmingCategoryUpdate = true;
    }

    public function confirmCategoryDeletion($id)
    {
        $this->confirmingCategoryDeletion = $id;
    }

    public function deleteCategory(foodCategories $category)
    {
        $category->delete();
        $this->confirmingCategoryDeletion = false;
        $this->emitTo('livewire-toast', 'showError', " دسته بندی با موفقیت حذف شد :) ");
    }

    public $category;

    public function refreshFoodTable()
    {
        $this->category = foodCategories::all();
    }

    public function render()
    {
        $this->refreshFoodTable();
        return view('livewire.admin.food-category', [
            'Category' => $this->category
        ]);
    }
}
