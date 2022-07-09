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
    public $food;
    public $discount;
    public $confirmingCategoryDeletion = false;
    public $confirmingCategoryUpdate = false;
    public $confirmingDiscount = false;
    public $confirmingEditDiscount = false;
    /**
     * @var Authenticatable|mixed|null
     */
    public mixed $user;

    protected $rules = [
        'food.title' => 'required|min:3',
        'food.price' => 'required|min:3',
        'food.food_categories_id' => 'required',
        'food.raw_material' => 'required'
    ];

    public function confirmCategoryAdd()
    {
        $this->reset(['food']);
        $this->confirmingCategoryUpdate = true;
    }

    public function editDiscount()
    {
        if (isset($this->food->id)) {
            $this->food->save();
            $dis = DiscountFood::where('food_id', '=', $this->food->id)->get()[0];
            $dis->discount_id = $this->discount['id'];
            $dis->save();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت بروزرسانی شد :)'
            ]);
        }
        $this->confirmingEditDiscount = false;
    }

    public function saveCategory()
    {
        $this->validate();
        if (isset($this->food->id)) {
            $this->food->save();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت بروزرسانی شد :)'
            ]);
        } else {
            Food::create([
                "food_categories_id" => $this->food['food_categories_id'],
                "price" => $this->food['price'],
                "raw_material" => $this->food['raw_material'],
                "title" => $this->food['title'],
                'restaurant_detail_id' => \auth()->user()->restaurantDetail->id,
            ]);
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت اضافه شد :)'
            ]);
        }
        $this->confirmingCategoryUpdate = false;
    }

    public function addDiscount()
    {
        $validatedData = $this->validate([
            'food.title' => 'required',
            'discount.id' => 'required'
        ]);
        DiscountFood::create([
            'food_id' => $this->food->id,
            'discount_id' => $this->discount['id']
        ]);
        $discountAdd = Food::find($this->food->id);
        if ($discountAdd->off === null) {
            $discountAdd->off = true;
            $discountAdd->save();
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت اضافه شد :)'
        ]);
        $this->confirmingDiscount = false;
    }

    public function confirmCategoryEdit(Food $id)
    {
        $this->resetErrorBag();
        $this->food = $id;
        $this->confirmingCategoryUpdate = true;
    }

    public function confirmAddDiscount(Food $id)
    {
        $this->resetErrorBag();
        $this->food = $id;
        $this->confirmingDiscount = true;
    }

    public function confirmEditDiscount(Food $id)
    {
        $this->resetErrorBag();
        $this->food = $id;
        $this->confirmingEditDiscount = true;
    }

    public function confirmCategoryDeletion($id)
    {
        $this->confirmingCategoryDeletion = $id;
    }

    public function deleteCategory(food $category)
    {
        $category->delete();
        $this->confirmingCategoryDeletion = false;
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت حذف شد'
        ]);
    }

    public function render()
    {
        $Category = Food::where('restaurant_detail_id', '=', \auth()->user()->restaurantDetail->id)->get();
        return view('livewire.seller.food-panel', [
            'Category' => $Category
        ]);
    }
}
