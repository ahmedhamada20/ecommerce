<?php

namespace App\Models;

use App\Enums\HyperlinksEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hyperlink extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'name_ar',
        'name_en',
        'link',
        'columns',
    ];

    protected $casts = [
        'type' => HyperlinksEnum::class
    ];
}
