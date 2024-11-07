<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'phone',
        'phone_1',
        'phone_2',
        'phone_3',
        'phone_4',
        'fb_link',
        'tw_link',
        'in_link',
        'payment_logo',
        'home_open_logo_new',
        'home_tilte_logo_new',
        'home_title_products_1',
        'notes_title_products_1',
        'home_title_products_2',
        'notes_title_products_2',
        'partners_logo',
        'category_logo',
        'banar_logo',
        'blog_logo',
        'category_logo_title_ar',
        'category_logo_title_en',
        'columns',
    ];
}
