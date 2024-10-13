<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SizeController extends Controller
{
    public function index()
    {
        $data =  QueryModelsAll('Size')->get();
        return view('admin.sizes.index', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            Size::create([
                'name'=> $request->name,
                'user_id'=>auth('web')->check() ? auth('web')->user()->id : null,
            ]);
            Session::flash('message', config('app.messages'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            Size::findorfail($request->id)->update([
                'name'=> $request->name,
                'user_id'=>auth('web')->check() ? auth('web')->user()->id : null,
            ]);
            Session::flash('message', config('app.edit'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        try {
            $checkColorInProduct = DB::table('products_sizes')->where('size_id', $request->id)->first();
            if ($checkColorInProduct) {
                Session::flash('message', config('app.product_check'));
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();
            }
            Size::destroy($request->id);
            Session::flash('message', config('app.deleted'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}
