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
        'slug',
        'image',
        'active',
        'description_ar',
        'description_en',
        'parent_id',
        'user_id',
        'columns',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
