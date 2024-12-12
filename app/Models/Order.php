<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number',
        'ref_id',
        'order_type',
        'payment_type',
        'customer_id',
        'coupon_id',
        'points_used',
        'status',
        'subtotal',
        'discount',
        'total',
        'shipping_address',
        'billing_address',
        'placed_at',
        'completed_at',
        'cancelled_at',
        'columns',
    ];


    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }


    public function coupon()
    {
        return $this->belongsTo(Coupon::class,'coupon_id');
    }
}
