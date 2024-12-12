<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Point extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id',
        'points',
        'type',
        'points_total',
        'value_exchanged',
        'description',
        'order_id',
        'exp_date',
        'columns',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
