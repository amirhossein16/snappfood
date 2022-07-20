<?php

namespace App\Http\Livewire;

use App\Models\foodCategories;
use Livewire\Component;

class AddModal extends Component
{
    public $confirmingCategoryUpdate = false;
    public $foodCategory;

    protected $listeners = ['confirmCategoryAdd'];

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

        $this->emit('refreshFoodTable');
        $this->reset(['foodCategory']);
        $this->confirmingCategoryUpdate = false;
    }

    public function render()
    {
        return view('livewire.add-modal');
    }
}
