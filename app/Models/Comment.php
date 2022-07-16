<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'orders_id',
        'restaurant_detail_id',
        'opinion',
        'score',
        'confirm'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
