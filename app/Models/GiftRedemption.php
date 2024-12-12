<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftRedemption extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id',
        'reward_id',
        'points_used',
        'redeemed_at',
        'columns',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function reward()
    {
        return $this->belongsTo(Reward::class,'reward_id');
    }
}
