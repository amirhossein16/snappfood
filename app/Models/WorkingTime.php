<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\OpeningHours\OpeningHours;

class WorkingTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'Saturday',
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'restaurant_detail_id',
    ];

    public function RestaurantDetail()
    {
        return $this->belongsTo(RestaurantDetail::class);
    }

    public function isOpen()
    {
        return OpeningHours::create([
            'Saturday' => ($this->Saturday == '-') ? [] : [$this->Saturday],
            'Sunday' => ($this->Sunday == '-') ? [] : [$this->Sunday],
            'Monday' => ($this->Monday == '-') ? [] : [$this->Monday],
            'Tuesday' => ($this->Tuesday == '-') ? [] : [$this->Tuesday],
            'Wednesday' => ($this->Wednesday == '-') ? [] : [$this->Wednesday],
            'Thursday' => ($this->Thursday == '-') ? [] : [$this->Thursday],
            'Friday' => ($this->Friday == '-') ? [] : [$this->Friday],
            'exceptions' => []
        ]);
    }
}
