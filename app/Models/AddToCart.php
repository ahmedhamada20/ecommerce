<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddToCart extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'customer_id',
        'product_id',
        'exp_date',
        'columns',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
