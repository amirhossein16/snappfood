<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class DiscountFood extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = ['food_id', 'discount_id'];

    public function Discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function Food()
    {
        return $this->belongsTo(Food::class);
    }
}
