<?php

namespace App\Http\Livewire\Seller;

use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $sellCount;
    public $query;
    public $search;

    public function mount()
    {
        $this->query = Orders::where('restaurant_detail_id', auth()->user()->restaurantDetail->id)->get();
    }

    public function sellCount()
    {
        return $this->query->count();
    }

    public function sumSellPrice()
    {
        return $this->query->sum('Total_price');
    }

    public function SellCompleteStatus()
    {
        return $this->query->where('OrderStatus', 4)->count();
    }

    public function sellSusspendStatus()
    {
        return $this->query->where('OrderStatus', 1)->count();
    }

    public function SearchInput()
    {
        if (!is_null($this->search)) {
            return $this->query->where('created_at', 'Like', $this->search)->get();
        } else {
            return $this->query;
        }
    }

    public function OrderSend()
    {
        return $this->query->where('OrderStatus', 4);
    }

    public function render()
    {
        return view('livewire.seller.dashboard', [
            'SellCount' => $this->sellCount(),
            'sumSellPrice' => $this->sumSellPrice(),
            'SellCompleteStatus' => $this->SellCompleteStatus(),
            'sellSusspendStatus' => $this->sellSusspendStatus(),
            'OrdersDetails' => $this->SearchInput(),
            'OrderSend' => $this->OrderSend()
        ]);
    }
}
