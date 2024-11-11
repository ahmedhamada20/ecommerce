<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name_ar',
        'name_en',
        'publish',
        'user_id',
        'columns',
    ];

    public function faq_questions()
    {
        return $this->hasOne(FaqQuestions::class,'faq_id');
    }
}
