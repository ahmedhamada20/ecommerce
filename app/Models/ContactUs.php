<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'messages',
        'subject',
        'columns_1',
        'columns_2',
        'columns_3',
        'columns_4',
        'columns_5',
        'columns_6',
        'columns_7',
        'columns_8',
    ];
}
