<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\Controller;
use App\Models\restaurantCategories;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Categories extends Component
{
    public $user;
    public $Categories;
    protected $listeners = ['RefreshTable'];

    public function mount()
    {
        $controller = new Controller;
        $controller->middleware(function ($request, $next) {
            $this->user = Auth::guard('superAdmin')->user();
            return $next($request);
        });
    }


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
