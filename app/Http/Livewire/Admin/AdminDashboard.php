<?php

namespace App\Http\Livewire\Admin;

use App\Models\Orders;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDashboard extends Component
{
    use WithPagination;

    public $query;
    public $search;

    public function mount()
    {
        $this->query = Orders::all();
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

    public function render()
    {
        return view('livewire.admin.admin-dashboard', [
            'SellCount' => $this->sellCount(),
            'sumSellPrice' => $this->sumSellPrice(),
            'SellCompleteStatus' => $this->SellCompleteStatus(),
            'sellSusspendStatus' => $this->sellSusspendStatus(),
            'OrdersDetails' => Orders::where('OrderStatus', '!=', 5)->paginate(5),
        ]);
    }
}
