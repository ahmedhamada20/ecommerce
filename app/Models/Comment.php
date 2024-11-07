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
        'rateable_id',
        'rateable_type',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
