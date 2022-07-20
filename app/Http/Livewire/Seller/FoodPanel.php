<?php

namespace App\Http\Livewire\Seller;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\DiscountFood;
use App\Models\Food;
use App\Models\restaurantCategories;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FoodPanel extends Component
{

    protected $listeners = ['reloadFoodTable'];

//    public function confirmCategoryDeletion($id)
//    {
//        $this->confirmingCategoryDeletion = $id;
//    }
//
//    public function deleteCategory(food $category)
//    {
//        $category->delete();
//        $this->confirmingCategoryDeletion = false;
//        $this->dispatchBrowserEvent('alert', [
//            'type' => 'success', 'message' => 'دسته بندی با موفقیت حذف شد'
//        ]);
//    }

    public $Category;

    public function reloadFoodTable()
    {
        $this->Category = Food::where('restaurant_detail_id', '=', \auth()->user()->restaurantDetail->id)->get();
    }

    public function render()
    {
        $this->reloadFoodTable();
        return view('livewire.seller.food-panel', [
            'Category' => $this->Category
        ]);
    }
}
