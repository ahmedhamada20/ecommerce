<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $data = QueryModelsAll('Product')->paginate(50);
        return view('admin.products.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'categories' => QueryModelsAll('Category')->whereActive(1)->get(),
            'brand' => QueryModelsAll('Brand')->get(),
            'colors' => QueryModelsAll('Color')->get(),
            'sizes' => QueryModelsAll('Size')->get(),
            'tags' => QueryModelsAll('Tag')->get(),
        ];
        return view('admin.products.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status_products(Request $request)
    {
        $yourModel = Product::find($request->id);
        $yourModel->publish = $request->input('publish');
        $yourModel->save();
        return response()->json(['message' => 'تم تحديث الحالة بنجاح']);
    }
}
