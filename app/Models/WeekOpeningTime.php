<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeekOpeningTime extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['day', 'start', 'end', 'restaurant_detail_id'];

    public function RestaurantDetail()
    {
        return $this->belongsTo(RestaurantDetail::class);
    }

    /**
     * Get the user's first name.
     *
     * @return Attribute
     */
    protected function Day(): Attribute
    {
        $weekDays = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
        return Attribute::make(
            get: fn($value) => $weekDays[$value - 1],
        );
    }
}
