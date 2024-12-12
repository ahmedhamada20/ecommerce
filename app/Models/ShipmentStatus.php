<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipmentStatus extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'shipment_id',
        'status',
        'message',
        'exp_date',
        'columns',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipments::class,'shipment_id');
    }
}
