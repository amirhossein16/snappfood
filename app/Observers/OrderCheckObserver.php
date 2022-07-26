<?php

namespace App\Observers;

use App\Models\Orders;

class OrderCheckObserver
{
//    /**
//     * Handle the Orders "created" event.
//     *
//     * @param \App\Models\Orders $orders
//     * @return void
//     */
//    public function created(Orders $orders)
//    {
//        $orders->cart->cartFood->map(function ($value) {
//            if ($value->Food->discountFood != null) {
//                if ($value->Food->discountFood->discount->type == "Percentage") {
//                    $value->price = $value->Food->price * (1 - (($value->Food->discountFood->discount->amount ?? 0) / 100));
//                } elseif ($value->Food->discountFood->discount->type == "Price") {
//                    $value->price = $value->Food->price - $value->Food->discountFood->discount->amount ?? 0;
//                }
//                $value->save();
//            }
//        });
//        $orders->Total_price = $orders->cart->cartFood->sum('price');
//        $orders->save();
//    }

    public function creating(Orders $orders)
    {
        $orders->cart->cartFood->map(function ($value) {
            if ($value->Food->discountFood != null) {
                if ($value->Food->discountFood->discount->type == "Percentage") {
                    $value->price = $value->Food->price * (1 - (($value->Food->discountFood->discount->amount ?? 0) / 100));
                } elseif ($value->Food->discountFood->discount->type == "Price") {
                    $value->price = $value->Food->price - $value->Food->discountFood->discount->amount ?? 0;
                }
                $value->save();
            }
        });
        $orders->Total_price = $orders->cart->cartFood->sum('price');
    }

    /**
     * Handle the Orders "updated" event.
     *
     * @param \App\Models\Orders $orders
     * @return void
     */
    public function updated(Orders $orders)
    {
        //
    }

    /**
     * Handle the Orders "deleted" event.
     *
     * @param \App\Models\Orders $orders
     * @return void
     */
    public function deleted(Orders $orders)
    {
        //
    }

    /**
     * Handle the Orders "restored" event.
     *
     * @param \App\Models\Orders $orders
     * @return void
     */
    public function restored(Orders $orders)
    {
        //
    }

    /**
     * Handle the Orders "force deleted" event.
     *
     * @param \App\Models\Orders $orders
     * @return void
     */
    public function forceDeleted(Orders $orders)
    {
        //
    }
}
