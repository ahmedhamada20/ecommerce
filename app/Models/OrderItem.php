<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'attribute_id',
        'attribute_value_id',
        'product_id',
        'quantity',
        'price_per_unit',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }


    public function attribute()
    {
        return $this->belongsTo(Attribute::class,'attribute_id');
    }


    public function attribute_value()
    {
        return $this->belongsTo(AttributeValue::class,'attribute_value_id');
    }
}
