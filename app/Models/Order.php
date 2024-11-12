<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'ref_id',
        'order_type',
        'payment_type',
        'customer_id',
        'coupon_id',
        'status',
        'subtotal',
        'discount',
        'total',
        'columns',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
