<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'user_id',
        'columns',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
