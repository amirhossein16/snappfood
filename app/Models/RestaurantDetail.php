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

    protected $fillable = ['name',
        'restaurant_categories_id',
        'address',
        'phone',
        'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurantCategory()
    {
        return $this->belongsTo(restaurantCategories::class);
    }

    public function food()
    {
        return $this->hasMany(Food::class);
    }

    protected function scopeRestaurantCategoriesId(): Attribute
    {
        return Attribute::make(
            get: fn($value) => restaurantCategories::where('id', '=', $value)->get()[0]->RestaurantType
        );
    }
}
