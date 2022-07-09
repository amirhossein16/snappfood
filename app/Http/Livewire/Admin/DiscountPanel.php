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
    public $discount;
    public $confirmingCategoryDeletion = false;
    public $confirmingCategoryUpdate = false;
    /**
     * @var Authenticatable|mixed|null
     */
    public $user;

    protected $rules = [
        'discount.title' => 'required|min:3',
        'discount.type' => 'required|min:3',
        'discount.amount' => 'required',
        'discount.ExpireTime' => 'required|after:today',
    ];

    public function confirmCategoryAdd()
    {
        $this->reset(['discount']);
        $this->confirmingCategoryUpdate = true;
    }

    public function saveCategory()
    {
        $this->validate();
        $this->discount['ExpireTime'] = Carbon::parse($this->discount['ExpireTime'])->timezone('Asia/Tehran');
        if (isset($this->discount->id)) {
            $this->discount->save();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت بروزرسانی شد :)'
            ]);
        } else {
            Discount::create([
                'title' => $this->discount['title'],
                'amount' => $this->discount['amount'],
                'ExpireTime' => $this->discount['ExpireTime'],
                'type' => $this->discount['type'],
            ]);
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت اضافه شد :)'
            ]);
        }
        $this->confirmingCategoryUpdate = false;
    }

    public function confirmCategoryEdit(Discount $id)
    {
        $this->resetErrorBag();
        $this->discount = $id;
        $this->confirmingCategoryUpdate = true;
    }

    public function confirmCategoryDeletion($id)
    {
        $this->confirmingCategoryDeletion = $id;
    }

    public function deleteCategory(Discount $category)
    {
        $category->delete();
        $this->confirmingCategoryDeletion = false;
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت حذف شد'
        ]);
    }

    public function render()
    {
        $Discount = Discount::all();
        $DiscountType = ['Price', 'Percentage'];
        return view('livewire.admin.discount-panel', [
            'Discounts' => $Discount,
            'DiscountType' => $DiscountType
        ]);
    }
}
