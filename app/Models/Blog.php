<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'short_description',
        'description',
        'notes',
        'publish',
        'date',
        'count_view',
        'count_comments',
        'user_id',
        'columns',
    ];
}
