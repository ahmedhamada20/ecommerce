<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'status',
        'user_id',
        'customer_id',
    ];


    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

}
