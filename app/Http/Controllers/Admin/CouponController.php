<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = queryModels('Coupon', [], ['perPage' => 10, 'page' => 1], ['user', 'customer']);
        return view('admin.coupons.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        Coupon::create(array_merge($request->validated(), [
            'user_id' => auth()->check()  ? auth()->id() : null,
            'customer_id' =>  $request->customer_id  ?  $request->customer_id : null,
        ]));

        return redirect()->route('admin_coupons.index')->with('success', 'Coupon created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, $id)
    {
        $coupon = Coupon::findOrFail($request->id);
        $coupon->update(array_merge($request->validated(), [
            'user_id' => auth()->check()  ? auth()->id() : null,
            'customer_id' =>  $request->customer_id  ?  $request->customer_id : null,
        ]));

        return redirect()->route('admin_coupons.index')->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail(\request()->id);
        $coupon->delete();
        return redirect()->route('admin_coupons.index')->with('success', 'Coupon deleted successfully.');
    }

    public function updateCouponStatus(Request $request)
    {

        $brand = Coupon::find($request->id);
        if (!$brand) {
            return response()->json(['success' => false, 'message' => 'العلامة التجارية غير موجودة']);
        }
        $brand->status = $request->active;
        $brand->save();

        return response()->json(['success' => true, 'message' => 'تم تحديث الحالة بنجاح']);
    }
}
