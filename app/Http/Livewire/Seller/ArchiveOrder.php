<?php

namespace App\Http\Livewire\Seller;

use App\Models\Cart;
use App\Models\Orders;
use App\Models\User;
use Livewire\Component;

class ArchiveOrder extends Component
{
    public $allOrders;
    public $search;
    protected $listeners = ['resetInput'];

    public function archive()
    {
        $this->allOrders = Orders::where('OrderStatus', 4)->search(trim($this->search))->get();
    }

    public function resetInput()
    {
        $this->reset(['search']);
    }

    public function render()
    {
        $this->archive();
        return view('livewire.seller.archive-order', [
            'AllOrders' => $this->allOrders
        ]);
    }
}
