<?php

namespace App\Http\Controllers;

use App\Models\RestaurantDetail;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class Address extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RestaurantDetail::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required|max:150',
            'address' => 'required|max:255',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);
        UserAddress::create($input);
        return response()->json([
            'msg' => "Address add successfully",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'address' => 'required'
        ]);
        $blog = UserAddress::where('id', '=', $id)->get()[0];
        $blog->address = $input['address'];
        $blog->save();
        return response()->json([
            'msg' => "Address Update successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
