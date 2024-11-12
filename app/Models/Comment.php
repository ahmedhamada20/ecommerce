<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'note',
        'customer_id',
        'commentable_id',
        'commentable_type',
        'value',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
