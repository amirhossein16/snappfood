<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restaurantCategories extends Model
{
    use HasFactory;

    protected $fillable = ['RestaurantType'];

    public function restaurantDetail()
    {
        return $this->hasMany(RestaurantDetail::class);
    }
}
