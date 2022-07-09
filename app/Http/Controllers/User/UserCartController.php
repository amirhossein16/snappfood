<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartFood;
use App\Models\Food;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserCartController extends Controller
{
    public string $food;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $cart = Cart::where([['user_id', '=', auth('api')->user()->id], ['state', 'FirstCart']])->get()->first();
        if (!empty($cart)) {
            $user = Cart::where([['user_id', '=', auth('api')->user()->id],['state','FirstCart']])->get()->first();
            $UserCarts = CartFood::where('cart_id', '=', $user->id)->get();
            return response()->json($UserCarts);
        }
        return response()->json(['msg' => 'not product in cart']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $food = Food::findOrFail($request->food_id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['msg' => 'Food Not Found'], 404);
        }


        $cart = Cart::where([['user_id', auth('api')->id()], ['state', 'FirstCart']])->get()->first();
        if ($cart == null)
            $cart = Cart::create([
                'user_id' => auth('api')->user()->id,
                'price' => (int)$food->price,
                'state' => 'FirstCart',
                'restaurant_detail_id' => $food->restaurant_detail_id
            ]);

        $cartFood = CartFood::where(['cart_id' => $cart->id, 'food_id' => $food->id])->get()->first();
        if ($cartFood) {
            $cartFood->count += $request->count;
            $cartFood->price = 25000;
            $cartFood->save();
        } else {
            $cartFood = new CartFood();
            $cartFood->cart_id = $cart->id;
            $cartFood->food_id = $food->id;
            $cartFood->count = $request->count;
            $cartFood->price = 25000;
            $cartFood->save();
        }
        return response()->json(['msg' => 'added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param $cart_id
     * @return Response
     */
    public function show($cart_id)
    {
        return Cart::where('id', $cart_id)->get()->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
