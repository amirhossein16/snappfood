<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\Food;
use Closure;
use Illuminate\Http\Request;

class RestaurantIsOpenMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        if (Cart::find($request->cart_id) != null) {
            $cart = Cart::find($request->cart_id)->cartFood->first()->food_id;
            $food = Food::find($cart);
            if ($food->RestaurantDetail->is_open) {
                return response()->json([
                    'msg' => 'The Restaurant is Currently close'
                ]);
            }
            if (!$food->RestaurantDetail->WorkingTime->isOpen()->isOpenAt(now())) {
                return response()->json([
                    'msg' => 'The time of your request is outside the working hours of this restaurant'
                ]);
            }
            return $next($request);
        } else {
            return response()->json([
                'msg' => 'The shopping cart is not available'
            ]);
        }
    }
}
