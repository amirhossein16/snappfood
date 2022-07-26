<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\CartFood;
use App\Models\Discount;
use App\Models\DiscountFood;
use App\Models\Food;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function index()
    {
        $cart = Cart::where([['user_id', '=', auth('api')->user()->id], ['state', 'FirstCart']])->get()->first();
        if (!empty($cart)) {
            $userCart = Cart::where([['user_id', '=', auth('api')->user()->id], ['state', 'FirstCart']])->get();
            return CartResource::collection($userCart);
        }
        return response()->json(['msg' => 'not product in cart']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(Request $request)
    {
        try {
            $food = Food::findOrFail($request->food_id);
        } catch (Exception $e) {
            return response()->json(['msg' => 'Food Not Found' . $e->getMessage()], 404);
        }
        try {
            if (empty(
            CartFood::where([['food_id', $request->food_id], ['cart_id', auth('api')->user()->cart]])->get())
            )
                return response()->json(['msg' => 'Food Exist']);
            DB::beginTransaction();

            $cart = Cart::where([['user_id', auth('api')->id()], ['state', 'FirstCart'], ['restaurant_detail_id', $food->restaurant_detail_id]])->get()->first();
            if ($food->off == 1) {

                $query = Discount::where('id', DiscountFood::where('food_id', $food->id)->get()->first()->discount_id)->get()->first();

                if ($query->type == 'Percentage') {

                    $foodPrice = ((int)$food->price * (100 - $query->amount)) / 100;

                } elseif ($query->type == 'Price') {

                    $foodPrice = (int)$food->price - $query->amount;
                }
            } else {
                $foodPrice = (int)$food->price;
            }

            if ($cart == null) {
                $cart = Cart::create([
                    'user_id' => auth('api')->user()->id,
                    'price' => $foodPrice ? $foodPrice * $request->count : $food->price * $request->count,
                    'state' => 'FirstCart',
                    'restaurant_detail_id' => $food->restaurant_detail_id
                ]);
            } else {
                $cart->price += ($foodPrice * $request->count);
                $cart->save();
            }

            $cartFood = CartFood::where(['cart_id' => $cart->id, 'food_id' => $food->id])->get()->first();
            if (!is_null($cartFood)) {
                $cartFood->count += $request->count;
                $cartFood->price = (int)$food->price;
                $cartFood->save();
            } else {
                CartFood::create([
                    'cart_id' => $cart->id,
                    'food_id' => $food->id,
                    'count' => (int)$request->count,
                    'price' => (int)$food->price,
                ]);
            }
            DB::commit();
            return response()->json(['msg' => "added successfully"]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['MSG' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $cart_id
     * @return Response
     */
    public
    function show($cart_id)
    {
        return Cart::where('id', $cart_id)->get()->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $cart = Cart::where([['id', $id], ['user_id', auth('api')->user()->id]])->get()->first();
        $food = CartFood::where([['food_id', (int)$request->food_id], ['cart_id', $cart->id]])->get()->first();
        if ($food) {
            if ((int)$request->count > 0) {
                $food->count += (int)$request->count;
                $food->save();
                return \response()->json(['msg' => "Food with ID => $request->food_id Count Update"]);
            } elseif ((int)$request->count == 0) {
                return \response()->json(['msg' => "Your Count Request is Zero"]);
            } else {
                $food->count += (int)$request->count;
                if ($food->count < 0) {
                    return \response()->json(['msg' => "Your Food Number is less than $request->count"]);
                } else {
                    if ($food->count == 0) {
                        $food->delete();
                        return \response()->json(['msg' => "Food Remove Successfully"]);
                    }
                    $food->save();
                    return \response()->json(['msg' => "Food with ID => $request->food_id Count Update"]);
                }
            }
        } else {
            return \response()->json(['msg' => 'Food Not Exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
    {
        //
    }
}
