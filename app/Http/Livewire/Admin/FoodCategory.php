<?php

namespace App\Http\Livewire\Admin;

use App\Models\foodCategories;
use Livewire\Component;

class FoodCategory extends Component
{
    public $category;

    protected $listeners = ['RefreshTable' => 'refreshFoodTable'];

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
