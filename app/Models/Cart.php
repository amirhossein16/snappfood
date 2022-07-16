<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'restaurant_detail_id', 'price', 'state'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurantDetail()
    {
        return $this->belongsTo(RestaurantDetail::class);
    }

    public function cartFood()
    {
        return $this->hasMany(CartFood::class);
    }

    public function food()
    {
        return $this->hasOne(Food::class);
    }

    public function Orders()
    {
        $this->hasMany(Orders::class);
    }
}
