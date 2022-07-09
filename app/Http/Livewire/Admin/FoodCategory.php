<?php

namespace App\Http\Livewire\Admin;

use App\Models\foodCategories;
use Livewire\Component;

class FoodCategory extends Component
{
    public $foodCategory;
    public $confirmingCategoryDeletion = false;
    public $confirmingCategoryUpdate = false;

    protected $rules = [
        'foodCategory.FoodType' => 'required|min:3'
    ];

    public function confirmCategoryAdd()
    {
        $this->reset(['foodCategory']);
        $this->confirmingCategoryUpdate = true;
    }

    public function saveCategory()
    {
        $this->validate();

        if (isset($this->foodCategory->id)) {
            $this->foodCategory->save();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت بروزرسانی شد :)'
            ]);
        } else {
            foodCategories::create([
                'FoodType' => $this->foodCategory['FoodType'],
            ]);
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت اضافه شد :)'
            ]);
        }
        $this->reset(['foodCategory']);
        $this->confirmingCategoryUpdate = false;
    }

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
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت حذف شد'
        ]);
    }

    public function render()
    {
        $Category = foodCategories::all();
        return view('livewire.admin.food-category', [
            'Category' => $Category
        ]);
    }
}
