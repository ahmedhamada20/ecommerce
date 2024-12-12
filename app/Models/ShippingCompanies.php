<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingCompanies extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'api_url',
        'api_key',
        'active',
        'columns',
    ];
}
