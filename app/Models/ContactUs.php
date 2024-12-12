<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'messages',
        'subject',
        'type',
        'columns_1',
        'columns_2',
        'columns_3',
        'columns',
    ];
}
