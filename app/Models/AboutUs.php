<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo',
        'description_ar',
        'description_en',
        'photo_1',
        'description_ar_1',
        'description_en_1',
        'logo_1',
        'description_logo_1_ar',
        'description_logo_1_en',
        'logo_2',
        'description_logo_2_ar',
        'description_logo_2_en',
        'logo_3',
        'description_logo_3_ar',
        'description_logo_3_en',
    ];
}
