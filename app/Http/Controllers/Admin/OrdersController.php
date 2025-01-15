<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = [];
        $relationships = [];
        if ($request->filled('order_numbers') || $request->filled('status_orders') || $request->filled('type_orders') || $request->filled('phone_number')) {
            if ($request->filled('order_numbers')) {
                $filters[] = ['order_number', 'like', '%' . $request->order_numbers . '%'];
            }

            if ($request->filled('status_orders')) {
                $filters[] = ['status', '=', $request->status_orders];
            }

            if ($request->filled('type_orders')) {
                $filters[] = ['order_type', '=', $request->type_orders];
            }
            if ($request->filled('phone_number')) {
                $relationships['customer'] = function ($query) use ($request) {
                    $query->where('phone', 'like', '%' . $request->phone_number . '%');
                };
            }
        }


        $data = queryModelsOrders('Order', $filters, ['perPage' => 500, 'page' => $request->get('page', 1)], ['customer', 'coupon'], $relationships);
        return view('admin.orders.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Order::where('order_number', $id)->first();
        return view('admin.orders.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Order::findorfail($request->id)->update([
            'status' => $request->status,
        ]);
        OrderStatus::create([
            'order_id'=>$request->id,
            'status'=>$request->status,
            'user_id'=>auth()->id(),
        ]);

        return redirect()->back()
            ->with('success', "Change Order Status");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
