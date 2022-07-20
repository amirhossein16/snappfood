<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\Discount;
use Carbon\Carbon;
use Livewire\Component;

class FoodDiscountAddModal extends Component
{
    public $discount;
    public $confirmingDiscountAddModal = false;
    protected $listeners = ['confirmDiscountAdd'];

    protected $rules = [
        'discount.title' => 'required|min:3',
        'discount.type' => 'required|min:3',
        'discount.amount' => 'required',
        'discount.ExpireTime' => 'required|after:today',
    ];

    public function confirmDiscountAdd()
    {
        $this->reset(['discount']);
        $this->confirmingDiscountAddModal = true;
    }

    public function saveDiscount()
    {
        $this->validate();
        $this->discount['ExpireTime'] = Carbon::parse($this->discount['ExpireTime'])->timezone('Asia/Tehran');

        Discount::create([
            'title' => $this->discount['title'],
            'amount' => $this->discount['amount'],
            'ExpireTime' => $this->discount['ExpireTime'],
            'type' => $this->discount['type'],
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت اضافه شد :)'
        ]);

        $this->emit('refreshDiscountTable');
        $this->confirmingDiscountAddModal = false;
    }

    public function render()
    {
        return view('livewire.admin.modals.food-discount-add-modal');
    }
}
