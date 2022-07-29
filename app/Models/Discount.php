<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Discount extends Model
{
    use HasFactory;
    use HasRoles;
    use SoftDeletes;

    protected $fillable = ['title', 'amount', 'type','ExpireTime'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function DiscountFood()
    {
        return $this->hasOne(DiscountFood::class);
    }
}
