<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;

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
}
