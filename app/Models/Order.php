<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes,HasUlids;

    protected $fillable = [
        'ref_id',
        'order_type',
        'payment_type',
        'payment_status',
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
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function detailsOrders()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }

    public function statusOrders()
    {
        return $this->hasMany(OrderStatus::class, 'order_id');
    }
}
