<?php

namespace App\Http\Livewire\Seller;

use App\Models\Cart;
use App\Models\CartFood;
use App\Models\DiscountFood;
use App\Models\Food;
use App\Models\Orders;
use App\Models\User;
use App\Notifications\OrderMailNotif;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Notification;
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
    protected $listeners = ['reloadOrderTable'];

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
        $this->OrderDetailsShow = false;
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت حذف شد'
        ]);
    }

    public $Order;

    public function reloadOrderTable()
    {
        $this->Order = Orders::where('restaurant_detail_id', '=', \auth()->user()->restaurantDetail->id)->get();
    }

    public function render()
    {
        $this->reloadOrderTable();
        return view('livewire.seller.oreders-panel-controller', [
            'Category' => $this->Order
        ]);
    }
}
