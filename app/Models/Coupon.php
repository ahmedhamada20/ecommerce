<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'code',
        'description',
        'discount_value',
        'discount_type',
        'max_used',
        'times_used',
        'status',
        'start_date',
        'end_date',
    ];
}
