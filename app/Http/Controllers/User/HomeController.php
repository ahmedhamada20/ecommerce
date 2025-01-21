<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use App\Models\Comparison;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Wishlist;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function orders()
    {
        $data = queryModels('Order', [
            'customer_id' => auth()->user()->id
        ], [
            'perPage' => 500,
            'page' => 1
        ]);
        return view('user.orders.index', compact('data'));

    }

    public function show($id)
    {
        $row = Order::where('order_number', $id)->firstOrFail();
        return view('user.orders.show', compact('row'));
    }

    public function user_profile()
    {
        return view('user.profile.index');
    }


    public function coupon_user()
    {
        $data = Coupon::where('customer_id',auth()->user()->id)->get();
       return view('user.coupon.index',compact('data'));
    }

    public function coupon_user_order($id)
    {

        $coupon = Coupon::where('code',$id)->firstorfail();
        $data = queryModels('Order', [
            'coupon_id' => $coupon->id
        ], [
            'perPage' => 500,
            'page' => 1
        ]);
       return view('user.coupon.orders',compact('data'));
    }

    public function wishlists()
    {
        $data = Wishlist::where('customer_id',auth()->user()->id)->get();
        return view('user.wishlist.index',compact('data'));
    }
    public function comparisons()
    {
        $data = Comparison::where('user_id',auth()->user()->id)->get();
        return view('user.comparisons.index',compact('data'));
    }

    public function carts()
    {
        $data = AddToCart::where('customer_id',auth()->user()->id)->get();
        return view('user.carts.index',compact('data'));
    }
}
