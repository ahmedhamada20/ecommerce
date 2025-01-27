<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

//    function __construct()
//    {
//        $this->middleware('permission:Product', ['only' => ['index','create','store','edit','update','destroy']]);
//    }
    public function index()
    {
        $data = queryModels('Product', [], ['perPage' => 50, 'page' => 1], ['user', 'brand', 'currency', 'coupons','categories']);
        return view('admin.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::get();
        $brand = Brand::get();
        return view('admin.products.create',compact('products','brand'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'colors' => 'nullable|array',
            'colors.code' => 'nullable|array',
            'colors.name' => 'nullable|array',
            'colors.size' => 'nullable|array',
            'colors.quantity' => 'nullable|array',
            'specification_name' => 'nullable|array',
            'specification_value' => 'nullable|array',
            'labels' => 'nullable|array',
            'categories' => 'nullable|array',
            'related_products' => 'nullable|array',
        ]);


        
        return redirect()->route('products.index')->with('success', 'Product created successfully.');

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
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
