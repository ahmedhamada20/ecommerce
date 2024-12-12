<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipments extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'shipping_company_id',
        'tracking_number',
        'status',
        'shipment_data',
        'columns',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }


    public function shipping_company()
    {
        return $this->belongsTo(ShippingCompanies::class,'shipping_company_id');
    }
}
