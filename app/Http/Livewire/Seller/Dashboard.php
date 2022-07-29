<?php

namespace App\Http\Livewire\Seller;

use App\Models\CartFood;
use App\Models\Food;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

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
        return $this->query->where('OrderStatus', "<", 4)->count();
    }

    public function render()
    {
        return view('livewire.seller.dashboard', [
            'SellCount' => $this->sellCount(),
            'sumSellPrice' => $this->sumSellPrice(),
            'SellCompleteStatus' => $this->SellCompleteStatus(),
            'sellSusspendStatus' => $this->sellSusspendStatus(),
            'OrdersDetails' => Orders::where('restaurant_detail_id', auth()->user()->restaurantDetail->id)->paginate(5),
            'OrderSend' => Orders::where([['restaurant_detail_id', auth()->user()->restaurantDetail->id], ['OrderStatus', 4]])->paginate(5),
            'BestSeller' => Orders::all()->groupBy('restaurant_detail_id'),
//            'TheBestFood' => CartFood::where('food_id', Food::where('restaurant_detail_id', '=', \auth()->user()->restaurantDetail->id)->get()->map(function ($value) {
//                return $value->id;
//            }))->get()->groupBy('food_id')
        ]);
    }
}
