<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'status',
        'photo',
        'comments',
        'value',
        'commentable_id',
        'commentable_type',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }
}
