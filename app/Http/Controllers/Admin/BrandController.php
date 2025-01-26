<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Brand;
use App\Models\Photo;
use App\Models\Product;
use App\Models\SEOMetadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class BrandController extends Controller
{
//    public function __construct()
//    {
//
//        if (!auth()->user()->can('Brand')) {
//            abort(403);
//        }
//    }
    public function index()
    {
        $brands = queryModels('Brand', [], ['perPage' => 50, 'page' => request('page', 1)], ['user']);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {

        $data = Brand::create(array_merge($request->validated(), [
            'user_id' => auth()->check() ?  auth()->id() : 1,
            'active' => true,
        ]));

        SEOMetadata::create([
            'entitytypeable_type'=> Brand::class,
            'entitytypeable_id'=> $data->id,
            'meta_title_ar' => $data->name_ar,
            'meta_title_en' => $data->name_en,
            'meta_description_ar' => $data->description_ar,
            'meta_description_en' => $data->description_en,
        ]);

        if($data){
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('brands', 'public');
                Photo::create([
                    'filename' => $imagePath,
                    'photoable_type' => Brand::class,
                    'photoable_id' => $data->id,
                ]);
            }
        }
        return redirect()->route('admin_brands.index')->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($request->id);


        $brand->update(array_merge($request->validated(), [
            'user_id' => auth()->check() ? auth()->id() : 1,
        ]));


        SEOMetadata::updateOrCreate([
            'entitytypeable_type'=> Brand::class,
            'entitytypeable_id'=> $brand->id,
        ],[
            'entitytypeable_type'=> Brand::class,
            'entitytypeable_id'=> $brand->id,
            'meta_title_ar' => $brand->name_ar,
            'meta_title_en' => $brand->name_en,
            'meta_description_ar' => $brand->description_ar,
            'meta_description_en' => $brand->description_en,
        ]);

        if ($request->hasFile('image')) {
            $oldPhoto = $brand->photo()->first();
            if ($oldPhoto) {
                if (Storage::exists('public/' . $oldPhoto->filename)) {
                    Storage::delete('public/' . $oldPhoto->filename);
                }
                $oldPhoto->delete();
            }
            $image = $request->file('image');
            $imagePath = $image->store('brands', 'public');
            Photo::create([
                'filename' => $imagePath,
                'photoable_type' => Brand::class,
                'photoable_id' => $brand->id,
            ]);
        }
        return redirect()->route('admin_brands.index')->with('success', 'Brand updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail(\request()->id);
        $check = Product::where('brand_id',$brand->id)->first();
        if ($check){
            return redirect()->route('admin_brands.index')->with('error', 'This brand is related to products..');

        }
        $oldPhoto = $brand->photo()->first();
        if ($oldPhoto) {
            if (Storage::exists('public/' . $oldPhoto->filename)) {
                Storage::delete('public/' . $oldPhoto->filename);
            }
            $oldPhoto->delete();
        }
        $brand->delete();
        return redirect()->route('admin_brands.index')->with('success', 'Brand deleted successfully.');
    }

    public function updateBrandStatus(Request $request)
    {

        $brand = Brand::find($request->id);
        if (!$brand) {
            return response()->json(['success' => false, 'message' => 'العلامة التجارية غير موجودة']);
        }
        $brand->active = $request->active;
        $brand->save();

        return response()->json(['success' => true, 'message' => 'تم تحديث الحالة بنجاح']);
    }
}
