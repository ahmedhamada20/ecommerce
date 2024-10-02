<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function setting()
    {
        $data = Info::first();
        return view('admin.settings.index', compact('data'));
    }

    public function setting_update(Request $request)
    {

        Info::updateOrcreate([
            'id' => $request->id
        ], [
            'phone' => $request->phone,
            'fb_link' => $request->fb_link,
            'tw_link' => $request->tw_link,
            'in_link' => $request->in_link,
            'columns' => json_encode($request->columns)
        ]);

        return redirect()->back()->with([
            'success' => 'تم الحفظ والتعديل'
        ]);
    }

}
