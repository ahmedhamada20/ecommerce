<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialAllProducts extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'special_product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function special_product()
    {
        return $this->belongsTo(SpecialProducts::class,'special_product_id');
    }
}
