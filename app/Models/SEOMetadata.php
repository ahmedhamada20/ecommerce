<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEOMetadata extends Model
{
    use HasFactory;
    protected $fillable = [
        'entitytypeable_type',
        'entitytypeable_id',
        'meta_title_ar',
        'meta_title_en',
        'meta_description_ar',
        'meta_description_en',
        'meta_keywords_ar',
        'meta_keywords_en',
        'canonical_url_ar',
        'canonical_url_en',
    ];
}
