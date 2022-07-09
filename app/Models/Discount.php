<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Discount extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = ['title', 'amount', 'type','ExpireTime'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function discountFood()
    {
        return $this->belongsTo(DiscountFood::class);
    }
}
