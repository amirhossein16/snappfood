<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\CartFood;
use App\Models\Food;
use App\Models\Orders;
use Livewire\Component;

class OrderDetailsModal extends Component
{
    public $orders;
    public $details;
    public $total;
    public $OrderDetailsModal = false;
    protected $listeners = ['OrderDetails'];

    public function OrderDetails(Orders $id)
    {
        $this->total = 0;
        foreach (CartFood::where('cart_id', $id->cart_id)->get() as $item) {
            $this->details[] = $item;
            $this->total += $item->price;
        }
        $this->OrderDetailsModal = true;
    }

    public function render()
    {
        return view('livewire.seller.modals.order-details-modal');
    }
}
