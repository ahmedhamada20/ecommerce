<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand', 'user', 'commentable')->paginate(10);
        // dd($products->toArray());
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'slug_ar' => 'nullable|string|unique:products,slug_ar',
            'slug_en' => 'nullable|string|unique:products,slug_en',
            'SKU' => 'required|string|unique:products,SKU',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'short_description_ar' => 'nullable|string',
            'short_description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'brand_id' => 'nullable|exists:brands,id',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'colors' => 'nullable|array',
            'colors.*.code' => 'nullable|string',
            'colors.*.name' => 'nullable|string',
            'colors.*.size' => 'nullable|string',
            'colors.*.quantity' => 'nullable|integer',
            'specification_name' => 'nullable|array',
            'specification_value' => 'nullable|array',
            'tax_names' => 'nullable|array',
            'tax_rates' => 'nullable|array',
            'coupon_names' => 'nullable|array',
            'coupon_number' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $validated['slug_ar'] = $validated['slug_ar'] ?? Str::slug($validated['name_ar']);
        $validated['slug_en'] = $validated['slug_en'] ?? Str::slug($validated['name_en']);
        $validated['user_id'] = auth()->id();
    
        $product = Product::create($validated);
    
        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/products', $filename);
                $product->images()->create(['filename' => $filename]);
            }
        }
    
        if ($request->has('colors')) {
            foreach ($request->colors as $color) {
                $product->colors()->create([
                    'code' => $color['code'] ?? null,
                    'name' => $color['name'] ?? null,
                    'size' => $color['size'] ?? null,
                    'quantity' => $color['quantity'] ?? null,
                ]);
            }
        }
    
        if ($request->has('specification_name')) {
            foreach ($request->specification_name as $key => $specName) {
                $product->specifications()->create([
                    'name' => $specName,
                    'value' => $request->specification_value[$key] ?? null,
                ]);
            }
        }
    
        if ($request->has('tax_names')) {
            foreach ($request->tax_names as $key => $taxName) {
                $product->taxes()->create([
                    'name' => $taxName,
                    'rate' => $request->tax_rates[$key] ?? null,
                ]);
            }
        }
    
        if ($request->has('coupon_names')) {
            foreach ($request->coupon_names as $key => $couponName) {
                $product->coupons()->create([
                    'name' => $couponName,
                    'value' => $request->coupon_number[$key] ?? null,
                ]);
            }
        }
    
        return redirect()->route('admin_products.index')->with('success', 'Product created successfully.');
    }
    

    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'brands', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'slug_ar' => 'nullable|string|unique:products,slug_ar,' . $product->id,
            'slug_en' => 'nullable|string|unique:products,slug_en,' . $product->id,
            'SKU' => 'required|string|unique:products,SKU,' . $product->id,
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'short_description_ar' => 'nullable|string',
            'short_description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'brand_id' => 'nullable|exists:brands,id',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'colors' => 'nullable|array',
            'colors.*.id' => 'nullable|exists:colors,id', // Assuming colors have unique IDs
            'colors.*.code' => 'nullable|string',
            'colors.*.name' => 'nullable|string',
            'colors.*.size' => 'nullable|string',
            'colors.*.quantity' => 'nullable|integer',
            'specification_name' => 'nullable|array',
            'specification_name.*' => 'nullable|string',
            'specification_value' => 'nullable|array',
            'specification_value.*' => 'nullable|string',
            'tax_names' => 'nullable|array',
            'tax_names.*' => 'nullable|string',
            'tax_rates' => 'nullable|array',
            'tax_rates.*' => 'nullable|numeric',
            'coupon_names' => 'nullable|array',
            'coupon_names.*' => 'nullable|string',
            'coupon_number' => 'nullable|array',
            'coupon_number.*' => 'nullable|numeric',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'remove_images' => 'nullable|array',
            'remove_images.*' => 'exists:images,id', // Assuming images have unique IDs
        ]);
    
        $validated['slug_ar'] = $validated['slug_ar'] ?? Str::slug($validated['name_ar']);
        $validated['slug_en'] = $validated['slug_en'] ?? Str::slug($validated['name_en']);
        $validated['user_id'] = auth()->id();
    
        $product->update($validated);
    
        $product->categories()->sync($request->categories ?? []);
    
        if ($request->filled('remove_images')) {
            $imagesToRemove = $product->images()->whereIn('id', $request->remove_images)->get();
            foreach ($imagesToRemove as $image) {
                \Storage::delete('public/products/' . $image->filename);
                $image->delete();
            }
        }
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $filename = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->storeAs('public/products', $filename);
                $product->images()->create(['filename' => $filename]);
            }
        }
    
        if ($request->has('colors')) {
            foreach ($request->colors as $colorData) {
                if (isset($colorData['id'])) {
                    $color = $product->colors()->find($colorData['id']);
                    if ($color) {
                        $color->update([
                            'code' => $colorData['code'] ?? $color->code,
                            'name' => $colorData['name'] ?? $color->name,
                            'size' => $colorData['size'] ?? $color->size,
                            'quantity' => $colorData['quantity'] ?? $color->quantity,
                        ]);
                    }
                } else {
                    $product->colors()->create([
                        'code' => $colorData['code'] ?? null,
                        'name' => $colorData['name'] ?? null,
                        'size' => $colorData['size'] ?? null,
                        'quantity' => $colorData['quantity'] ?? null,
                    ]);
                }
            }
        }
    
        // Optionally, remove colors that are not present in the request
        // $product->colors()->whereNotIn('id', collect($request->colors)->pluck('id'))->delete();
    
        // Update Specifications
        if ($request->has('specification_name')) {
            $product->specifications()->delete();
            foreach ($request->specification_name as $key => $specName) {
                if ($specName) { 
                    $product->specifications()->create([
                        'name' => $specName,
                        'value' => $request->specification_value[$key] ?? null,
                    ]);
                }
            }
        }
    
        // Update Taxes
        if ($request->has('tax_names')) {
            // Remove existing taxes
            $product->taxes()->delete();
            // Create new taxes
            foreach ($request->tax_names as $key => $taxName) {
                if ($taxName) { // Ensure tax name is not null
                    $product->taxes()->create([
                        'name' => $taxName,
                        'rate' => $request->tax_rates[$key] ?? null,
                    ]);
                }
            }
        }
    
        // Update Coupons
        if ($request->has('coupon_names')) {
            // Remove existing coupons
            $product->coupons()->delete();
            // Create new coupons
            foreach ($request->coupon_names as $key => $couponName) {
                if ($couponName) { // Ensure coupon name is not null
                    $product->coupons()->create([
                        'name' => $couponName,
                        'value' => $request->coupon_number[$key] ?? null,
                    ]);
                }
            }
        }
    
        return redirect()->route('admin_products.index')->with('success', 'Product updated successfully.');
    }
    

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin_products.index')->with('success', 'Product deleted successfully.');
    }
}
