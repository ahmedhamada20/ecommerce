<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reward extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'points_required',
        'is_active',
        'columns',
    ];
}
