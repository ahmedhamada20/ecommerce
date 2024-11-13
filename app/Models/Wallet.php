<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'amount',
        'status_amount',
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
