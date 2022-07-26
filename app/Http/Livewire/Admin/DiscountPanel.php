<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\restaurantCategories;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DiscountPanel extends Component
{
    public $allDiscount;
    protected $listeners = ['RefreshTable' => 'refreshDiscountTable'];

//    public function confirmCategoryDeletion($id)
//    {
//        $this->confirmingCategoryDeletion = $id;
//    }
//
//    public function deleteCategory(Discount $category)
//    {
//        $category->delete();
//        $this->confirmingCategoryDeletion = false;
//        $this->dispatchBrowserEvent('alert', [
//            'type' => 'success', 'message' => 'دسته بندی با موفقیت حذف شد'
//        ]);
//    }

    public function refreshDiscountTable()
    {
        $this->allDiscount = Discount::all();
    }

    public function render()
    {
        $this->refreshDiscountTable();
        return view('livewire.admin.discount-panel', [
            'Discounts' => $this->allDiscount,
        ]);
    }
}
