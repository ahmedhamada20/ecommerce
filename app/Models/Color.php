<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'active',
        'columns',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
