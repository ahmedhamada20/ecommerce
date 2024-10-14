<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'SKU',
        'discount_price',
        'price',
        'quantity',
        'short_description',
        'description',
        'notes',
        'stock',
        'publish',
        'user_id',
        'brand_id',
        'features',
        'columns',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories', 'product_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'products_tags', 'product_id', 'tag_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'products_colors', 'product_id', 'color_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'products_sizes', 'product_id', 'size_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function stock()
    {
        switch ($this->stock) {
            case "1":
                return '<span class="badge bg-success">متوافر</span>';
            case "0":
                return '<span class="badge bg-danger">غير متوافر</span>';
            default:
                return '<span class="badge bg-secondary">غير معروف</span>';
        }
    }
    public function publish()
    {
        switch ($this->publish) {
            case "1":
                return '<span class="badge bg-success">مفعل</span>';
            case "0":
                return '<span class="badge bg-danger">غير مفعل</span>';
            default:
                return '<span class="badge bg-secondary">غير معروف</span>';
        }
    }

    public function features()
    {
        switch ($this->features) {
            case "1":
                return '<span class="badge bg-success">مميز</span>';
            case "0":
                return '<span class="badge bg-danger">غير مميز</span>';
            default:
                return '<span class="badge bg-secondary">غير معروف</span>';
        }
    }

}
