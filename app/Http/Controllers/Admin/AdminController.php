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
            'name'=>$request->name,
            'logo'=>$request->logo,
            'phone'=>$request->phone,
            'phone_1'=>$request->phone_1,
            'phone_2'=>$request->phone_2,
            'phone_3'=>$request->phone_3,
            'phone_4'=>$request->phone_4,
            'fb_link'=>$request->fb_link,
            'tw_link'=>$request->tw_link,
            'in_link'=>$request->in_link,
            'payment_logo'=>$request->payment_logo,
            'home_open_logo_new'=>$request->home_open_logo_new,
            'home_tilte_logo_new'=>$request->home_tilte_logo_new,
            'home_title_products_1'=>$request->home_title_products_1,
            'notes_title_products_1'=>$request->notes_title_products_1,
            'home_title_products_2'=>$request->home_title_products_2,
            'notes_title_products_2'=>$request->notes_title_products_2,
            'partners_logo'=>$request->partners_logo,
            'category_logo'=>$request->category_logo,
            'banar_logo'=>$request->banar_logo,
            'blog_logo'=>$request->blog_logo,
            'category_logo_title_ar'=>$request->category_logo_title_ar,
            'category_logo_title_en'=>$request->category_logo_title_en,
        ]);

        return redirect()->back()->with([
            'success' => 'تم الحفظ والتعديل'
        ]);
    }

}
