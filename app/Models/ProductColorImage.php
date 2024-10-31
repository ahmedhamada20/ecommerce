<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'color_id',
        'image_path',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function resources()
    {
        return $this->hasMany(ProductColorImage::class, 'color_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id'); // تأكد من أن لديك 'color_id' في قاعدة البيانات
    }

}
