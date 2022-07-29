<?php

namespace App\Http\Livewire\Admin;

use App\Models\Discount;
use Livewire\Component;

class DiscountPanel extends Component
{
    public $allDiscount;
    protected $listeners = ['RefreshTable' => 'refreshDiscountTable'];

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
