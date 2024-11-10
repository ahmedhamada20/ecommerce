<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = QueryModelsAll('Coupon')->get();
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
    public function store(Request $request)
    {
        try {
            if ($request->end_date <= $request->start_date) {
                return redirect()->back()->withErrors(['error' => 'تاريخ الانتهاء يجب أن يكون أكبر من تاريخ البدء']);
            }

            Coupon::create([
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
                'code' => $request->code,
                'description' => $request->description,
                'discount_value' => $request->discount_value,
                'discount_type' => $request->discount_type,
                'max_used' => $request->max_used,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            Session::flash('message', config('app.messages'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Coupon::findorfail($id);
        return view('admin.coupons.edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            if ($request->end_date <= $request->start_date) {
                return redirect()->back()->withErrors(['error' => 'تاريخ الانتهاء يجب أن يكون أكبر من تاريخ البدء']);
            }

            Coupon::findorfail($request->id)->update([
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
                'code' => $request->code,
                'description' => $request->description,
                'discount_value' => $request->discount_value,
                'discount_type' => $request->discount_type,
                'max_used' => $request->max_used,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            Session::flash('message', config('app.edit'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $checkCoupon = DB::table('products_coupons')->where('coupon_id', $request->id)->first();
            if ($checkCoupon) {
                Session::flash('message', "هذا الكوبون مستخدم في احدي المنتجات برجاء الغاء تفعيل الكوبون");
                Session::flash('alert-class', 'alert-danger');
                return redirect()->back();
            }
            $checkCouponOrders = DB::table('orders')->where('coupon_id', $request->id)->first();
            if ($checkCouponOrders) {
                Session::flash('message', "هذا الكوبون مستخدم في احدي الطلبات برجاء الغاء تفعيل الكوبون ");
                Session::flash('alert-class', 'alert-danger');
                return redirect()->back();
            }
            Coupon::destroy($request->id);
            Session::flash('message', config('app.deleted'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }


    }


    public function status_coupons(Request $request)
    {
        $yourModel = Coupon::find($request->id);
        $yourModel->status = $request->input('active');
        $yourModel->save();
        return response()->json(['message' => 'تم تحديث الحالة بنجاح']);
    }
}
