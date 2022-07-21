<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentsResource;
use App\Models\Comment;
use App\Models\Orders;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function index()
    {
        $comment = Comment::where([
            ['restaurant_detail_id', \request('restaurant_id')],
            ['confirm', 1]])->get();
        if (count($comment) != 0) {
            return CommentsResource::collection($comment);
        }
        return response()->json(['msg' => 'no Comment :(']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse|void
     */
    public function store(Request $request)
    {
        if (Orders::where('id', $request['orders_id'])->get()->first()->OrderStatus == 4 &&
            Orders::where([['id', $request['orders_id']], ['cart_id', auth('api')->user()->cart->id]]) != null
        ) {
            Comment::create([
                'user_id' => auth('api')->user()->id,
                'orders_id' => $request['orders_id'],
                'restaurant_detail_id' => Orders::where('id', $request['orders_id'])->get()->first()->restaurant_detail_id,
                'opinion' => $request['message'],
                'score' => $request['score'],
                'confirm' => false,
            ]);
            return response()->json(['msg' => 'comment Added Successfully']);
        } else {
            return response()->json(['msg' => 'Your Order not Completed !!! Or YOur Order Id is Not Correct !!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
