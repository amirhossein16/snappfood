<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RestaurantDetail;
use App\Models\UserAddress;
use Illuminate\Support\Facades\DB;

class nearbyRestaurants extends Controller
{
    public $lat;
    public $long;
    public $array = [];

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $query = UserAddress::where([['currentAddress', 1], ['user_id', auth('api')->user()->id]])->get()->first();
        if ($query != null) {
            $this->lat = $query->latitude;
            $this->long = $query->longitude;
            RestaurantDetail::all()->map(function ($value) {
                $this->array[] = $value->select("*", DB::raw("6371 * acos(cos(radians(" . $this->lat . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $this->long . "))
                                + sin(radians(" . $this->lat . ")) * sin(radians(latitude))) AS distance"))->orderBy('distance')->get();
            });
            unset($this->array[1]);
            return $this->array;
        } else {
            return response()->json(['msg' => 'Please Set Current Location !']);
        }
    }

    public function store()
    {

    }
}
