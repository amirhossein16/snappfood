<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\Discount;
use Carbon\Carbon;
use Livewire\Component;

class FoodDiscountAddModal extends Component
{
    public $discount;
    public $confirmingDiscountaddModal = false;
    protected $listeners = ['confirmDiscountAdd'];

    protected $rules = [
        'discount.title' => 'required|min:4',
        'discount.amount' => 'required|integer',
        'discount.ExpireTime' => 'required|date_format:Y-m-d|after:today',
        'discount.type' => 'required',
    ];

    public function confirmDiscountAdd()
    {
        $this->confirmingDiscountaddModal = true;
    }

    public function addDiscount()
    {
        $this->validate();
        $this->discount['ExpireTime'] = Carbon::parse($this->discount['ExpireTime'])->timezone('Asia/Tehran');

        Discount::create([
            'title' => $this->discount['title'],
            'amount' => $this->discount['amount'],
            'ExpireTime' => $this->discount['ExpireTime'],
            'type' => $this->discount['type'],
        ]);

        $this->emit('RefreshTable');
        $this->emitTo('livewire-toast', 'show', " کدتخفیف با موفقیت افزوده شد :)");
        $this->confirmingDiscountaddModal = false;
    }

    public function render()
    {
        return view('livewire.admin.modals.food-discount-add-modal');
    }
}
