<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
{

    public function index()
    {
        $data =  QueryModelsAll('Color')->get();
        return view('admin.color.index', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            Color::create([
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
            Color::findorfail($request->id)->update([
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
            $checkColorInProduct = DB::table('products_colors')->where('color_id', $request->id)->first();
            if ($checkColorInProduct) {
                Session::flash('message', config('app.product_check'));
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();
            }
            Color::destroy($request->id);
            Session::flash('message', config('app.deleted'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}
