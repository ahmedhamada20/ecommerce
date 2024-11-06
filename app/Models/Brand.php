<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name_ar',
        'name_en',
        'image',
        'count_view',
        'active',
        'user_id',
        'description',
        'columns',
    ];

   public function count() {
        return $this->hasMany(Product::class,'brand_id')->count();
    }
}
