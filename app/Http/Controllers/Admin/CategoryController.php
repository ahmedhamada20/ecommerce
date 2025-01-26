<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use App\Models\SEOMetadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

//    function __construct()
//    {
//        $this->middleware('permission:categories', ['only' => ['index','create','store','edit','update','destroy']]);
//    }
    public function index()
    {
        $data = queryModels('Category', [], ['perPage' => 10, 'page' => 1], ['user', 'parent']);
        return view('admin.categories.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = get_models('Category');
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $category =Category::create(array_merge($request->validated(), [
            'user_id' => auth()->check() ?  auth()->id() : 1    ,
        ]));


        SEOMetadata::create([
            'entitytypeable_type'=> Category::class,
            'entitytypeable_id'=> $category->id,
            'meta_title_ar' => $category->name_ar,
            'meta_title_en' => $category->name_en,
            'meta_description_ar' => $category->description_ar,
            'meta_description_en' => $category->description_en,
        ]);

        if($category){
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('categories', 'public');
                Photo::create([
                    'filename' => $imagePath,
                    'photoable_type' => Category::class,
                    'photoable_id' => $category->id,
                ]);
            }
        }
        return redirect()->route('admin_categories.index')->with('success', 'Category created successfully.');
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
        $categories = get_models('Category');
        $data = Category::findOrFail($id);
        return view('admin.categories.edit', compact('data','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request)
    {
        $category = Category::findOrFail($request->id);
        $category->update($request->validated());


        SEOMetadata::updateOrCreate([
            'entitytypeable_type'=> Category::class,
            'entitytypeable_id'=> $category->id,
        ],[
            'entitytypeable_type'=> Category::class,
            'entitytypeable_id'=> $category->id,
            'meta_title_ar' => $category->name_ar,
            'meta_title_en' => $category->name_en,
            'meta_description_ar' => $category->description_ar,
            'meta_description_en' => $category->description_en,
        ]);

        if ($request->hasFile('image')) {
            $oldPhoto = $category->photo()->first();
            if ($oldPhoto) {
                if (Storage::exists('public/' . $oldPhoto->filename)) {
                    Storage::delete('public/' . $oldPhoto->filename);
                }
                $oldPhoto->delete();
            }
            $image = $request->file('image');
            $imagePath = $image->store('categories', 'public');
            Photo::create([
                'filename' => $imagePath,
                'photoable_type' => Category::class,
                'photoable_id' => $category->id,
            ]);
        }
        return redirect()->route('admin_categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $checkProducts = DB::table('products_categories')->where('category_id', \request()->id)->first();
        if ($checkProducts){
            return redirect()->route('admin_categories.index')->with('error', 'This category is related to products. Please delete the products first.');

        }
        $category = Category::findOrFail(\request()->id);
        $category->delete();
        return redirect()->route('admin_categories.index')->with('success', 'Category deleted successfully.');
    }

    public function updateCategoryStatus(Request $request)
    {

        $brand = Category::find($request->id);
        if (!$brand) {
            return response()->json(['success' => false, 'message' => 'العلامة التجارية غير موجودة']);
        }
        $brand->active = $request->active;
        $brand->save();

        return response()->json(['success' => true, 'message' => 'تم تحديث الحالة بنجاح']);
    }
}
