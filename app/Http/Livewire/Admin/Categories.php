<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\Controller;
use App\Models\restaurantCategories;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function PHPUnit\Framework\isNull;

class Categories extends Component
{

    public $restaurantCategory;
    public $CategoryDeletion;
    public $confirmingCategoryDeletion = false;
    public $confirmingCategoryUpdate = false;
    public $wire;
    /**
     * @var Authenticatable|mixed|null
     */
    public mixed $user;
    protected $listeners = ['RefreshTable'];

    public function mount()
    {
        $controller = new Controller;
        $controller->middleware(function ($request, $next) {
            $this->user = Auth::guard('superAdmin')->user();
            return $next($request);
        });
    }

    public function confirmCategoryEdit(restaurantCategories $id)
    {
        $this->resetErrorBag();
        $this->restaurantCategory = $id;
        $this->confirmingCategoryUpdate = true;
    }


    public function confirmCategoryDeletion($id)
    {
        $this->confirmingCategoryDeletion = true;
        $this->CategoryDeletion = $id;
    }

    public function deleteCategory(restaurantCategories $category)
    {
        $category->delete();
        $this->confirmingCategoryDeletion = false;
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت حذف شد'
        ]);
    }

    public $Categories;

    public function RefreshTable()
    {
        $this->Categories = restaurantCategories::all();
    }

    public function render()
    {
        $this->RefreshTable();
        return view('livewire.admin.categories', [
            'Category' => $this->Categories
        ]);
    }
}
