<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_en', 'name_ar', 'slug_ar', 'slug_en', 'SKU', 'price', 'quantity', 
        'short_description_ar', 'short_description_en', 'description_ar', 'description_en',
        'status', 'brand_id', 'user_id'
    ];

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

    public function images()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function getLocalizedNameAttribute()
    {
        return App::getLocale() == "ar" ? $this->name_ar : $this->name_en;
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
    return $this->belongsToMany(Coupon::class, 'product_coupons');
}

public function tags()
{
    return $this->belongsToMany(Tag::class, 'products_tags');
}
}
