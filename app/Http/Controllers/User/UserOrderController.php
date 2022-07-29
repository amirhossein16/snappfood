<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\User;
use App\Notifications\OrderMailNotif;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class UserOrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
//        $this->middleware('isOpenRestaurant');
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
     * @param OrderRequest $request
     * @return JsonResponse
     */
    public function store(OrderRequest $request)
    {
        $request->validated();
        if (auth('api')->user()->UserAddress()->get()->first() != null) {
            if (!empty(auth('api')->user()->UserAddress()->get()->where('currentAddress', 1))) {
                try {
                    DB::beginTransaction();
                    $orders = Cart::where([['id', $request->input('cart_id')], ['user_id', auth('api')->user()->id]])->get()->first();
                    if ($orders != null && $orders->state == 'FirstCart') {
                        $orders->state = 'Payed';
                        $orders->save();
                        $lastOrder = Orders::create([
                            'cart_id' => $request->input('cart_id'),
                            'restaurant_detail_id' => $orders->restaurant_detail_id,
                            'Total_price' => $orders->price,
                            'OrderStatus' => 1
                        ]);
                        Notification::route('mail', [
                            'SnappFood@example.com' => 'Amirhossein MansourSamaee',
                        ])->notify(new OrderMailNotif($lastOrder));
                        DB::commit();
                        return response()->json(['msg' => 'payed successfully']);
                    } elseif ($orders != null && $orders->state == 'Payed') {
                        return response()->json(['msg' => 'This shopping cart has already been paid for']);
                    } else
                        DB::rollBack();
                    return response()->json(['msg' => 'The shopping cart is not available or you do not have access !(']);
                } catch (ModelNotFoundException $e) {
                    return response()->json(['msg' => 'Cart Not Found' . $e->getMessage()], 404);
                }
            } else {
                return response()->json(['msg' => 'You have not set your current address']);
            }
        } else {
            return response()->json(['msg' => 'You Should Select Your Address']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public
    function show($id)
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
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public
    function destroy($id)
    {
        //
    }
}
