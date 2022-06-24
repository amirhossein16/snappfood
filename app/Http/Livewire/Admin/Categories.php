<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\Controller;
use App\Models\restaurantCategories;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Categories extends Component
{

    public $restaurantCategory;
    public $confirmingCategoryDeletion = false;
    public $confirmingCategoryUpdate = false;
    /**
     * @var Authenticatable|mixed|null
     */
    public mixed $user;

    public function mount()
    {
        $controller = new Controller;
        $controller->middleware(function ($request, $next) {
            $this->user = Auth::guard('superAdmin')->user();
            return $next($request);
        });
    }

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
        $this->confirmingCategoryUpdate = false;
    }

    public function confirmCategoryEdit(restaurantCategories $id)
    {
        $this->resetErrorBag();
        $this->restaurantCategory = $id;
        $this->confirmingCategoryUpdate = true;
    }

    public function confirmCategoryDeletion($id)
    {
        $this->confirmingCategoryDeletion = $id;
    }

    public function deleteCategory(restaurantCategories $category)
    {
        $category->delete();
        $this->confirmingCategoryDeletion = false;
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت حذف شد'
        ]);
    }

    public function render()
    {
        $Category = restaurantCategories::all();
        return view('livewire.admin.categories', [
            'Category' => $Category
        ]);
    }
}
