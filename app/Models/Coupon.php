<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'customer_id',
        'type_code',
        'code',
        'description',
        'discount_value',
        'discount_type',
        'max_used',
        'times_used',
        'status',
        'start_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_coupons');
    }
    


    public function type_code()
    {
        switch ($this->type_code) {
            case '1':
                return "free";
            case '2':
                return "paid in customer";
            default:
                return "not type";
        }
    }
    
}
