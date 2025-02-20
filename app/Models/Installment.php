<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Installment extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'deposit',
        'down_payment',
        'profit',
        'min_price',
        'active',
        'columns',
    ];

    public function name()
    {
        return App::getLocale() == "ar" ? $this->name_ar : $this->name_en;
    }
}
