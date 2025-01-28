<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_en',
        'name_ar',
        'slug_ar',
        'slug_en',
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


    public function name()
    {
        return App::getLocale() == "ar" ? $this->name_ar : $this->name_en;
    }


    public function short_description()
    {
        return App::getLocale() == "ar" ? $this->short_description_ar : $this->short_description_en;
    }
    public function description()
    {
        return App::getLocale() == "ar" ? $this->description_ar : $this->description_en;
    }


    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }

    public function commentable()
    {
        return $this->morphMany(RateComment::class, 'commentable');
    }
}
