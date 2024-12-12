<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'attribute_id',
        'attribute_value_id',
        'photoable_id',
        'photoable_type',
    ];
}
