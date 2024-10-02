<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
{

    public function index()
    {
        $data = Color::all();
        return view('admin.color.index', compact('data'));
    }


    public function create()
    {
        //
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


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
