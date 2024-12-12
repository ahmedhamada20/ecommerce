<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'customer_id',
        'amount',
        'status',
        'status_amount',
        'columns',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }
}
