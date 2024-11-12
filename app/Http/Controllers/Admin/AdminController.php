<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        $logoName = null;
        if ($request->hasFile('logo')) {
            $logoName = time() . '_logo.' . $request->logo->extension();
            $request->logo->move(storage_path('app/public/logo'), $logoName);
        }


        $paymentLogoName = null;
        if ($request->hasFile('payment_logo')) {
            $paymentLogoName = time() . '_payment_logo.' . $request->payment_logo->extension();
            $request->payment_logo->move(storage_path('app/public/logo'), $paymentLogoName);
        }


        $homeOpenLogoName = null;
        if ($request->hasFile('home_open_logo_new')) {
            $homeOpenLogoName = time() . '_home_open_logo.' . $request->home_open_logo_new->extension();
            $request->home_open_logo_new->move(storage_path('app/public/logo'), $homeOpenLogoName);
        }


        $partnersLogoName = null;
        if ($request->hasFile('partners_logo')) {
            $partnersLogoName = time() . '_partners_logo.' . $request->partners_logo->extension();
            $request->partners_logo->move(storage_path('app/public/logo'), $partnersLogoName);
        }

        $categoryLogoName = null;
        if ($request->hasFile('category_logo')) {
            $categoryLogoName = time() . '_category_logo.' . $request->category_logo->extension();
            $request->category_logo->move(storage_path('app/public/logo'), $categoryLogoName);
        }


        $banarLogoName = null;
        if ($request->hasFile('banar_logo')) {
            $banarLogoName = time() . '_banar_logo.' . $request->banar_logo->extension();
            $request->banar_logo->move(storage_path('app/public/logo'), $banarLogoName);
        }


        $blogLogoName = null;
        if ($request->hasFile('blog_logo')) {
            $blogLogoName = time() . '_blog_logo.' . $request->blog_logo->extension();
            $request->blog_logo->move(storage_path('app/public/logo'), $blogLogoName);
        }


        Info::updateOrcreate([
            'id' => $request->id
        ], [
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'phone'=>$request->phone,
            'phone_1'=>$request->phone_1,
            'phone_2'=>$request->phone_2,
            'phone_3'=>$request->phone_3,
            'phone_4'=>$request->phone_4,
            'fb_link'=>$request->fb_link,
            'tw_link'=>$request->tw_link,
            'in_link'=>$request->in_link,
            'home_tilte_logo_new_ar'=>$request->home_tilte_logo_new_ar,
            'home_tilte_logo_new_en'=>$request->home_tilte_logo_new_en,
            'home_title_products_1_ar'=>$request->home_title_products_1_ar,
            'home_title_products_1_en'=>$request->home_title_products_1_en,
            'notes_title_products_1_ar'=>$request->notes_title_products_1_ar,
            'notes_title_products_1_en'=>$request->notes_title_products_1_en,
            'home_title_products_2_ar'=>$request->home_title_products_2_ar,
            'home_title_products_2_en'=>$request->home_title_products_2_en,
            'notes_title_products_2_ar'=>$request->notes_title_products_2_ar,
            'notes_title_products_2_en'=>$request->notes_title_products_2_en,
            'category_logo_title_ar'=>$request->category_logo_title_ar,
            'category_logo_title_en'=>$request->category_logo_title_en,


            'logo' => $logoName ?? $request->logo,
            'payment_logo' => $paymentLogoName ?? $request->payment_logo,
            'home_open_logo_new' => $homeOpenLogoName ?? $request->home_open_logo_new,
            'partners_logo' => $partnersLogoName ?? $request->partners_logo,
            'category_logo' => $categoryLogoName ?? $request->category_logo,
            'banar_logo' => $banarLogoName ?? $request->banar_logo,
            'blog_logo' => $blogLogoName ?? $request->blog_logo,
        ]);

        return redirect()->back()->with([
            'success' => 'تم الحفظ والتعديل'
        ]);
    }

}
