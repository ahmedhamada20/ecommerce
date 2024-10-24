<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name_ar',
        'name_en',
        'icon',
        'image',
        'active',
        'description',
        'parent_id',
        'user_id',
        'columns',
    ];

    public function parent()
    {
        return $this->hasOne(Category::class, 'id','parent_id');
    }

    public function parents()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_categories', 'category_id', 'product_id');
    }
}
