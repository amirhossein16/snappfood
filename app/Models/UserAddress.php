<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model implements JWTSubject
{
    use HasFactory;
    use Notifiable;


    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $fillable = [
        'user_id',
        'title',
        'address',
        'latitude',
        'longitude',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeNearByRestaurants($query, $lat, $long)
    {
        $query->whereHas(
            'addresses',
            fn($addresse) => $addresse->whereRaw(DB::raw("6371 * acos(cos(radians(" . $lat . "))
            * cos(radians(latitude))
            * cos(radians(longitude) - radians(" . $long . "))
            + sin(radians(" . $lat . "))
            * sin(radians(latitude))) < 5"))
        )->with([
            'addresses' => fn($addersses) => $addersses->select("*", DB::raw("6371 * acos(cos(radians(" . $lat . "))
            * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $long . "))
            + sin(radians(" . $lat . ")) * sin(radians(latitude))) AS distance"))->orderBy('distance')
        ]);
    }
    public function index(Request $request) {

        $lat = YOUR_CURRENT_LATTITUDE;
        $lon = YOUR_CURRENT_LONGITUDE;

        $data = DB::table("users")
            ->select("users.id"
                ,DB::raw("6371 * acos(cos(radians(" . $lat . "))
		        * cos(radians(users.lat))
		        * cos(radians(users.lon) - radians(" . $lon . "))
		        + sin(radians(" .$lat. "))
		        * sin(radians(users.lat))) AS distance"))
            ->groupBy("users.id")
            ->get();

        dd($data);
    }
}
