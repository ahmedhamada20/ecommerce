<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'rate',
        'short_description_ar',
        'short_description_en',
        'description_ar',
        'description_en',
        'notes_ar',
        'notes_en',
        'count_view',
        'count_comments',
        'user_id',
        'columns',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function commentable()
    {
        return $this->morphMany(RateComment::class, 'commentable');
    }
}
