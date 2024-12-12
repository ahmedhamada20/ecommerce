<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInstallment extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'order_id',
        'user_id',
        'value',
        'due_date',
        'paid_date',
        'status',
        'columns',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
