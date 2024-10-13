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
}
