<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'restaurant_detail_id', 'Total_price', 'OrderStatus'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function RestaurantDetail()
    {
        return $this->belongsTo(RestaurantDetail::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->Where('created_at', 'like', $term)
                ->orWhere('Total_price', 'like', $term);
        });
    }
}
