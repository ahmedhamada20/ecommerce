<?php

namespace App\Models;

use App\Enums\HyperlinksEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Slider extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name_ar',
        'name_en',
        'is_active',
        'description_ar',
        'description_en',
        'user_id',
        'columns',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function name()
    {
        return App::getLocale() == "ar" ? $this->name_ar : $this->name_en;
    }

    public function haberLinks()
    {
        return $this->morphMany(Hyperlink::class, 'hypertoable');
    }

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }
}
