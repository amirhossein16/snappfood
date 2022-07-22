<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Support\Facades\DB;

class nearbyRestaurants extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $query = UserAddress::where([['currentAddress', 1], ['user_id', auth('api')->user()->id]])->get()->first();
        if ($query != null) {
            $lat = $query->latitude;
            $lon = $query->longitude;
            $restaurant = DB::table('restaurant_details')->where('lat', '!=', null)->get()->first();
            if (DB::table('restaurant_details')->where('lat', '!=', null)) {
                $data = DB::table("restaurant_details")
                    ->select("restaurant_details.id"
                        , DB::raw("6371 * acos(cos(radians(" . $lat . "))
                * cos(radians($restaurant->lat))
                * cos(radians($restaurant->long) - radians(" . $lon . "))
                + sin(radians(" . $lat . "))
                * sin(radians($restaurant->lat))) AS distance"))
                    ->groupBy("restaurant_details.id")
                    ->get();
            }
        } else {
            return response()->json(['msg' => 'Please Set Current Location !']);
        }
//        $data = DB::table("user_addresses")
//            ->select("user_addresses.id"
//                , DB::raw("6371 * acos(cos(radians(" . $lat . "))
//                * cos(radians($lat))
//                * cos(radians($lon) - radians(" . $lon . "))
//                + sin(radians(" . $lat . "))
//                * sin(radians($lat))) AS distance"))
//            ->groupBy("user_addresses.id")
//            ->get();

        dd($data);
    }

    public function store()
    {

    }
}
