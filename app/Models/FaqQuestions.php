<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqQuestions extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'faq_id',
        'question',
        'answer',
        'columns',
    ];
}
