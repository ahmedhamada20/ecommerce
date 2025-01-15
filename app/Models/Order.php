<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number',
        'ref_id',
        'order_type',
        'payment_type',
        'customer_id',
        'coupon_id',
        'points_used',
        'status',
        'subtotal',
        'discount',
        'total',
        'shipping_address',
        'billing_address',
        'placed_at',
        'completed_at',
        'cancelled_at',
        'columns',
    ];


    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }


    public function order_items()
    {
        return $this->hasMany(OrderItem::class,'order_id')->sum('quantity');
    }



    public function coupon()
    {
        return $this->belongsTo(Coupon::class,'coupon_id');
    }

    public function getStatusColor()
    {
        switch ($this->status) {
            case 'pending':
                $color = 'warning';
                break;
            case 'processing':
                $color = 'info';
                break;
            case 'completed':
                $color = 'success';
                break;
            case 'cancelled':
                $color = 'danger';
                break;
            case 'refunded':
                $color = 'secondary';
                break;
            default:
                $color = 'dark';
        }

        return "<span class='badge rounded-pill bg-$color'>" . ucfirst($this->status) . "</span>";
    }
    public function getOrderTypeColor()
    {
        switch ($this->order_type) {
            case 'orders':
                $color = 'warning';
                break;
            case 'gifit':
                $color = 'info';
                break;
            default:
                $color = 'dark';
        }

        return "<span class='badge rounded-pill bg-$color'>" . ucfirst($this->order_type) . "</span>";
    }
}
