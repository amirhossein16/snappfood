<?php

namespace App\Http\Livewire\Seller;

use App\Models\Orders;
use Livewire\Component;

class OredersPanelController extends Component
{
    public $Order;
    protected $listeners = ['reloadOrderTable'];

    public function reloadOrderTable()
    {
        $this->Order = Orders::where([['restaurant_detail_id', '=', \auth()->user()->restaurantDetail->id], ['OrderStatus', '!=', 4]])->get();
    }

    public function render()
    {
        $this->reloadOrderTable();
        return view('livewire.seller.oreders-panel-controller', [
            'Orders' => $this->Order
        ]);
    }
}
