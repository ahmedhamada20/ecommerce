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
        'short_description_ar',
        'short_description_en',
        'description_ar',
        'description_en',
        'notes',
        'publish',
        'rate',
        'image',
        'date',
        'count_view',
        'count_comments',
        'user_id',
        'columns',
    ];

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function commentable()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
