<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Food extends Model
{
    use HasFactory;
    use HasRoles;
    use SoftDeletes;

    protected $fillable = [
        'food_categories_id',
        'price',
        'raw_material',
        'title',
        'restaurant_detail_id'
    ];

    public function RestaurantDetail()
    {
        return $this->hasOne(RestaurantDetail::class);
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

}
