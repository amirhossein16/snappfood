<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Http\Resources\RestaurantsResource;
use App\Models\RestaurantDetail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class RestaurantInformation extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $restaurantType = \request('type');
        $is_open = \request('is_open');
        $scoreGet = \request('score_gt');
        if (!empty($is_open) && empty($restaurantType))
            return RestaurantsResource::collection(RestaurantDetail::where('is_open', '=', $is_open)->get());
        if (!empty($restaurantType) && !empty($is_open))
            return RestaurantsResource::collection(RestaurantDetail::where([['is_open', $is_open], ['restaurant_categories_id', $restaurantType]])->get());
        if (!empty($restaurantType) && empty($is_open))
            return RestaurantsResource::collection(RestaurantDetail::where('restaurant_categories_id', $restaurantType)->get());
        return RestaurantsResource::collection(RestaurantDetail::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return RestaurantResource
     */
    public function show(int $id)
    {
        return new RestaurantResource(RestaurantDetail::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
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
