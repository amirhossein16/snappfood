<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Cart;
use App\Models\Orders;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class UserOrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $cart_id = Cart::where('user_id', auth('api')->user()->id)->get()->last();
        $order = Orders::where('cart_id', $cart_id->id)->get();
//        $order = Orders::where('cart_id', $request->input('cart_id'))->get();
        return OrderResource::collection($order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $order = Cart::where([['id', $request->input('cart_id')], ['user_id', auth('api')->user()->id]])->get()->first();
            if ($order != null && $order->state == 'FirstCart') {
                $order->state = 'Payed';
                $order->save();
                Orders::create([
                    'cart_id' => $request->input('cart_id'),
                    'restaurant_detail_id' => $order->restaurant_detail_id,
                    'Total_price' => $order->price,
                    'orderStatus' => 1
                ]);
                return response()->json(['msg' => 'payed successfully']);
            } elseif ($order != null && $order->state == 'Payed') {
                return response()->json(['msg' => 'This shopping cart has already been paid for']);
            } else
                return response()->json(['msg' => 'The shopping cart is not available or you do not have access !(']);

        } catch (ModelNotFoundException $e) {
            return response()->json(['msg' => 'Cart Not Found' . $e->getMessage()], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
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
