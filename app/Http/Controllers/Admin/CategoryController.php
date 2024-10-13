<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = QueryModelsAll('Category');
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereActive('1')->get();
        return view('admin.category.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(storage_path('app/public/category'), $imageName);
            Category::create([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'image' => $imageName,
                'description' => $request->description,
                'parent_id' => $request->parent_id ?? null,
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
        $categories = Category::whereActive('1')->get();
        $row = Category::findorfail($id);
        return view('admin.category.edit', compact('row','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        try {
            $category = Category::findOrFail($request->id);
            if(isset($request->image)){
                if (isset($request->old_file)){
                    if (file_exists(storage_path('app/public/category/' . $request->old_file))) {
                        File::delete(storage_path('app/public/category/' . $request->old_file));
                    }

                    $imageName = time() . '.' . $request->image->extension();
                    $request->image->move(storage_path('app/public/category'), $imageName);
                }
            }


            Category::findorfail($request->id)->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'image' => $imageName ?? $category->image,
                'description' => $request->description,
                'parent_id' => $request->parent_id ?? null,
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
            $checkColorInProduct = DB::table('products_categories')->where('category_id', $request->id)->first();
            if ($checkColorInProduct) {
                Session::flash('message', config('app.product_check'));
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();
            }
            if (isset($request->old_file)){
                if (file_exists(storage_path('app/public/category/' . $request->old_file))) {
                    File::delete(storage_path('app/public/category/' . $request->old_file));
                }
            }
            Category::destroy($request->id);
            Session::flash('message', config('app.deleted'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }


    public function status_category(Request $request)
    {
        $yourModel = Category::find($request->id);
        $yourModel->active = $request->input('active');
        $yourModel->save();
        return response()->json(['message' => 'تم تحديث الحالة بنجاح']);
    }

}
