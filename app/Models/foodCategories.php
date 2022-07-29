<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foodCategories extends Model
{
    use HasFactory;

    protected $fillable = ['FoodType'];

    public function Food()
    {
        return $this->hasOne(Food::class);
    }
}
