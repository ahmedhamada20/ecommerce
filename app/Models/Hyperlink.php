<?php

namespace App\Models;

use App\Enums\HyperlinksEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Hyperlink extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'hypertoable_type',
        'hypertoable_id',
        'name_ar',
        'name_en',
        'link',
        'columns',
    ];

    protected $casts = [
        'type' => HyperlinksEnum::class
    ];

    public function name()
    {
        return App::getLocale() == "ar" ? $this->name_ar : $this->name_en;
    }
}
