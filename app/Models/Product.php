<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Comment;


class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_en', 'name_ar', 'slug_ar', 'slug_en', 'SKU', 'price', 'quantity', 
        'short_description_ar', 'short_description_en', 'description_ar', 'description_en',
        'status', 'brand_id', 'user_id','coupon_id','type_discount','product_points','discount_price','weight', 'length', 'width', 'height'  
    ];


    public function attribute()
    {
        return $this->belongsTo(ProductAttributes::class,'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }

    public function commentable()
    {
        return $this->morphMany(RateComment::class, 'commentable')->where('status','active');
    }

    public function images()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function getLocalizedNameAttribute()
    {
        return App::getLocale() == "ar" ? $this->name_ar : $this->name_en;
    }
    public function slug()
    {
        return App::getLocale() == "ar" ? $this->slug_ar : $this->slug_en;
    }


    public function short_description()
    {
        return App::getLocale() == "ar" ? $this->short_description_ar : $this->short_description_en;
    }
    public function description()
    {
        return App::getLocale() == "ar" ? $this->description_ar : $this->description_en;
    }
    public function name()
    {
        return App::getLocale() == "ar" ? $this->name_ar : $this->name_en;
    }
// دالة لإرجاع الوصف بشكل مفكك
public function getDecodedDescriptionArAttribute()
{
    return json_decode($this->description_ar, true);
}

public function getDecodedDescriptionEnAttribute()
{
    return json_decode($this->description_en, true);
}

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }
    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function colors()
{
    return $this->hasMany(ProductColor::class);
}

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }
    
    public function taxes()
    {
        return $this->hasMany(ProductTax::class);
    }
    
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'products_coupons');
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'products_tags');
    }
   
}
