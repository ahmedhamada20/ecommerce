<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'image',
        'active',
        'description_ar',
        'description_en',
        'parent_id',
        'user_id',
        'columns',
    ];

    public function parent()
    {
        return $this->hasOne(Category::class, 'parent_id');
    }
    public function parents()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function name()
    {
        return App::getLocale() == "ar" ? $this->name_ar : $this->name_en;
    }

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_categories');
    }
}
