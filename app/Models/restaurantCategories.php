<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class restaurantCategories extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['RestaurantType'];

    public function RestaurantDetail()
    {
        return $this->hasOne(RestaurantDetail::class);
    }
}
