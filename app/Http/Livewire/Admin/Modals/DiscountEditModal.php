<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\Discount;
use Carbon\Carbon;
use Livewire\Component;

class DiscountEditModal extends Component
{
    public $discount;
    public $confirmingDiscountEditModal = false;
    protected $listeners = ['EditModalConfirm'];

    protected $rules = [
        'discount.title' => 'required|min:3',
        'discount.type' => 'required|min:3',
        'discount.amount' => 'required',
        'discount.ExpireTime' => 'required|after:today',
    ];

    public function EditModalConfirm(Discount $id)
    {
        $this->confirmingDiscountEditModal = true;
        $this->discount = $id;
    }

    public function editDiscount()
    {
        $this->validate();

        $this->discount['ExpireTime'] = Carbon::parse($this->discount['ExpireTime'])->timezone('Asia/Tehran');

        if (isset($this->discount->id)) {
            $this->discount->save();
        }

        $this->emit('RefreshTable');
        $this->emitTo('livewire-toast', 'show', " کدتخفیف با موفقیت بروزرسانی شد :)");
        $this->confirmingDiscountEditModal = false;
    }

    public function render()
    {
        return view('livewire.admin.modals.discount-edit-modal');
    }
}
