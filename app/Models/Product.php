<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_en',
        'name_ar',
        'slug',
        'SKU',
        'product_points',
        'coupon_id',
        'type_discount',
        'discount_price',
        'price',
        'quantity',
        'short_description_ar',
        'short_description_en',
        'description_ar',
        'description_en',
        'notes_ar',
        'notes_en',
        'stock',
        'publish',
        'user_id',
        'brand_id',
        'currency_id',
        'features',
        'tags',
        'start_date_discount',
        'end_date_discount',
        'end_time_date_discount',
        'news',
        'columns',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'products_tags');
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'products_coupons');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }

}
