<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\AddressRequest;
use App\Http\Resources\UsersAddressResource;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class AddressController extends Controller
{
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
        if (UserAddress::where('user_id', auth('api')->user()->id)->get()->first() == null)
            return response()->json(['msg' => 'no any address']);
        return UsersAddressResource::collection(UserAddress::where('user_id', auth('api')->user()->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(AddressRequest $request)
    {
        $input = $request->validated();
        UserAddress::create([
            'user_id' => auth('api')->user()->id,
            'title' => $input['title'],
            'address' => $input['address'],
            'latitude' => $input['latitude'],
            'longitude' => $input['longitude'],
        ]);
        return response()->json([
            'msg' => "Address add successfully",
        ]);
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
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $addresses = UserAddress::where('user_id', auth('api')->user()->id)->get();
        foreach ($addresses as $item) {
            if ($item->currentAddress == 1) {
                $item->currentAddress = 0;
                $item->save();
            }
        }
        $input = $request->validate([
            'address' => 'required',
            'title' => 'required|max:30',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        $address = UserAddress::where([['id', '=', $id], ['user_id', auth('api')->user()->id]])->get()->first();
        if ($address == null) {
            return response()->json([
                'msg' => "Unauthenticated.",
            ]);
        } else {
            $address->address = $input['address'];
            $address->currentAddress = true;
            $address->save();
            return response()->json([
                'msg' => "Address Update And Set Current Address successfully",
            ]);
        }
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
