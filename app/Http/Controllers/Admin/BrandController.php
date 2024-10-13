<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = QueryModelsAll('Brand')->get();
        return view('admin.brand.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        try {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(storage_path('app/public/brands'), $imageName);
            Brand::create([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'image' => $imageName,
                'description' => $request->description,
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
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
        $row = Brand::findorfail($id);
        return view('admin.brand.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        try {
            $Brand = Brand::findOrFail($request->id);

            if(isset($request->image)){
                if (isset($request->old_file)){
                    if (file_exists(storage_path('app/public/brands/' . $request->old_file))) {
                        File::delete(storage_path('app/public/brands/' . $request->old_file));
                    }

                    $imageName = time() . '.' . $request->image->extension();
                    $request->image->move(storage_path('app/public/brands'), $imageName);
                }
            }


            Brand::findorfail($request->id)->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'image' => $imageName ?? $Brand->image,
                'description' => $request->description,
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
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
            $checkbrandsInProduct = DB::table('products')->where('brand_id', $request->id)->first();
            if ($checkbrandsInProduct) {
                Session::flash('message', config('app.product_check'));
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();
            }
            if (isset($request->old_file)){
                if (file_exists(storage_path('app/public/brands/' . $request->old_file))) {
                    File::delete(storage_path('app/public/brands/' . $request->old_file));
                }
            }
            Brand::destroy($request->id);
            Session::flash('message', config('app.deleted'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }



    public function status_Brand(Request $request)
    {
        $yourModel = Brand::find($request->id);
        $yourModel->active = $request->input('active');
        $yourModel->save();
        return response()->json(['message' => 'تم تحديث الحالة بنجاح']);
    }
}
