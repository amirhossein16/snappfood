<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class RestaurantDetail extends Model
{
    use HasFactory;
    use HasRoles;

//    protected $appends = ['distance'];

    protected $fillable = ['name',
        'restaurant_categories_id',
        'address',
        'phone',
        'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurantCategories()
    {
        return $this->belongsTo(restaurantCategories::class);
    }

    public function food()
    {
        return $this->hasMany(Food::class);
    }

//    protected function scopeRestaurantCategoriesId(): Attribute
//    {
//        return Attribute::make(
//            get: fn($value) => restaurantCategories::where('id', '=', $value)->get()->first()->RestaurantType
//        );
//    }

    public function cartId()
    {
        return $this->hasOne(Cart::class);
    }

    public function WeekOpeningTime()
    {
        return $this->hasMany(WeekOpeningTime::class);
    }

    public function Orders()
    {
        return $this->hasMany(Orders::class);
    }

    public function WorkingTime()
    {
        return $this->hasOne(WorkingTime::class);
    }
}
