<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliticalPrivate extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_ar',
        'title_en',
        'notes_ar',
        'notes_en',
    ];
}
