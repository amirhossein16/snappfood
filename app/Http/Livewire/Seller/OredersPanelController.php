<?php

namespace App\Http\Livewire\Seller;

use App\Models\Cart;
use App\Models\CartFood;
use App\Models\DiscountFood;
use App\Models\Food;
use App\Models\Orders;
use Illuminate\Contracts\Auth\Authenticatable;
use Livewire\Component;

class OredersPanelController extends Component
{
    public $order;
    public $discount;
    public $OrderDetailsShow = false;
    public $confirmingChangeOrderStatus = false;
    public $confirmingDiscount = false;
    public $confirmingEditDiscount = false;
    /**
     * @var Authenticatable|mixed|null
     */
    public mixed $user;
    public $details = [];


    public function ChangeOrderStatus(Cart $id)
    {
        $this->resetErrorBag();
        $this->order = $id;
        if ($this->order->orderStatus == 4) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning', 'message' => 'محصول تحویل داده شده است !'
            ]);
        } else
            $this->confirmingChangeOrderStatus = true;
    }

    public function ConvertOrderStatus()
    {
        if ($this->order->orderStatus < 5) {
            $status = Cart::where('user_id', '=', $this->order->user_id)->get()->first();
            $OrderStatus = Orders::where('cart_id', '=', $status->id)->get()->first();
            $status->orderStatus += 1;
            $OrderStatus->OrderStatus += 1;
            $status->save();
            $OrderStatus->save();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'وضعیت با موفقیت تغییر کرد !'
            ]);
        }
        $this->confirmingChangeOrderStatus = false;
    }

    public function confirmAddDiscount(Food $id)
    {
        $this->resetErrorBag();
        $this->order = $id;
        $this->confirmingDiscount = true;
    }

    public function confirmEditDiscount(Food $id)
    {
        $this->resetErrorBag();
        $this->order = $id;
        $this->confirmingEditDiscount = true;
    }

    public function OrderDetails(Orders $id)
    {
        $food = Food::find($id->cart_id);
//        $cart = CartFood::find($food->cart_id);
        foreach (CartFood::where('cart_id', $id->cart_id)->get() as $item) {
            $this->details[] = $item;
        }
        $this->OrderDetailsShow = true;
    }

    public function deleteCategory(Orders $category)
    {
        dd($category);
        $this->OrderDetailsShow = false;
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت حذف شد'
        ]);
    }

    public function render()
    {
        $Category = Orders::where('restaurant_detail_id', '=', \auth()->user()->restaurantDetail->id)->get();
        return view('livewire.seller.oreders-panel-controller', [
            'Category' => $Category
        ]);
    }
}
