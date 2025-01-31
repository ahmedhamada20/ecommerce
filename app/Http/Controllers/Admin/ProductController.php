<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Coupon;


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
        $coupons = Coupon::all(); // ✅ جلب جميع القسائم من قاعدة البيانات

        return view('admin.products.create', compact('brands', 'categories', 'coupons'));
    }

    public function store(Request $request)
    {
        // ✅ 1. التحقق من صحة البيانات
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'slug_ar' => 'nullable|string|unique:products,slug_ar',
            'slug_en' => 'nullable|string|unique:products,slug_en',
            'SKU' => 'required|string|unique:products,SKU',
            'price' => 'required|numeric',
            'quantity' =>'nullable|numeric',
            'discount_price' => 'nullable|numeric|min:0', 
            'discount' => 'nullable|numeric|min:0|max:100', // ✅ إضافة التحقق من النسبة المئوية للخصم            'quantity' => 'required|integer',
            'short_description_ar' => 'nullable|string',
            'short_description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'brand_id' => 'nullable|exists:brands,id',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'colors' => 'nullable|array',
            'colors.code.*' => 'nullable|string',
            'colors.name.*' => 'nullable|string',
            'colors.size.*' => 'nullable|string',
            'colors.quantity.*' => 'nullable|integer',
            'specification_name' => 'nullable|array',
            'specification_value' => 'nullable|array',
            'tax_names' => 'nullable|array',
            'tax_rates' => 'nullable|array',
            'coupon_names' => 'nullable|array',
            'coupon_number' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    // حساب مجموع كميات الألوان إذا تم إدخالها
if ($request->has('colors') && is_array($request->colors['quantity'])) {
    $validated['quantity'] = array_sum($request->colors['quantity']);
} else {
    $validated['quantity'] = 0; // إذا لم يكن هناك ألوان، تكون الكمية 0
}
        // ✅ 2. ضبط `slug_ar` و `slug_en` بحيث يكونان فريدين
        $validated['slug_ar'] = $validated['slug_ar'] ?? \Illuminate\Support\Str::slug($validated['name_ar']);
        $validated['slug_en'] = $validated['slug_en'] ?? \Illuminate\Support\Str::slug($validated['name_en']);
        $validated['product_points'] = $validated['price'] * 0.2; // ✅ 10% من السعر كنقاط مثال
// التحقق مما إذا كان `coupon_ids` موجودًا في الطلب، وتخزين أول `coupon_id`
// التحقق مما إذا كان `coupon_ids` موجودًا في الطلب، وتخزين أول `coupon_id`
if ($request->filled('discount') && $validated['discount_price'] == null) {
    $validated['discount_price'] = $validated['price'] - ($validated['price'] * ($request->discount / 100));
}
// معالجة وإعداد الوصف قبل التخزين
$descriptions_ar = [];
$descriptions_en = [];

if ($request->filled('Description') && is_array($request->Description)) {
    // تخزين الوصف بالعربية
    if (isset($request->Description['name_ar']) && is_array($request->Description['name_ar'])) {
        foreach ($request->Description['name_ar'] as $index => $name_ar) {
            if (!empty($name_ar)) {
                $descriptions_ar[] = [
                    'name' => $name_ar,
                    'value' => $request->Description['value_ar'][$index] ?? null,
                ];
            }
        }
    }

    // تخزين الوصف بالإنجليزية
    if (isset($request->Description['name_en']) && is_array($request->Description['name_en'])) {
        foreach ($request->Description['name_en'] as $index => $name_en) {
            if (!empty($name_en)) {
                $descriptions_en[] = [
                    'name' => $name_en,
                    'value' => $request->Description['value_en'][$index] ?? null,
                ];
            }
        }
    }
}

// حفظ البيانات في المنتج
$validated['description_ar'] = json_encode($descriptions_ar, JSON_UNESCAPED_UNICODE);
$validated['description_en'] = json_encode($descriptions_en, JSON_UNESCAPED_UNICODE);

// إنشاء المنتج


if ($request->filled('coupon_ids')) {
    $validated['coupon_id'] = $request->coupon_ids[0]; // ✅ أول قسيمة فقط
    $coupon = \App\Models\Coupon::find($validated['coupon_id']);
    $validated['type_discount'] = $coupon ? $coupon->discount_type : null;
} else {
    $validated['coupon_id'] = null;
    $validated['type_discount'] = null;
}



        // إذا كان هناك `slug` مكرر، يتم إضافة رقم تسلسلي
        $counter = 1;
        while (Product::where('slug_ar', $validated['slug_ar'])->exists()) {
            $validated['slug_ar'] = Str::slug($validated['name_ar']) . '-' . $counter;
            $counter++;
        }
    
        $counter = 1;
        while (Product::where('slug_en', $validated['slug_en'])->exists()) {
            $validated['slug_en'] = Str::slug($validated['name_en']) . '-' . $counter;
            $counter++;
        }
    
        // ✅ 3. تعيين المستخدم الحالي كمنشئ المنتج
        $validated['user_id'] = auth()->id();
    
        // ✅ 4. إنشاء المنتج
        $product = Product::create($validated);
    
        // ✅ 5. حفظ التصنيفات (Categories)
        if ($request->filled('categories')) {
            $product->categories()->sync($request->categories);
        }
    
        // ✅ 6. حفظ الصور (Images)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/products');
                $product->images()->create(['filename' => basename($path)]);
            }
        }
    
        $totalQuantity = 0; // متغير لتخزين مجموع الكمية
        if ($request->has('colors')) {
            foreach ($request->colors['name'] as $index => $name) {
                if (!empty($name)) {
                    $product->colors()->create([
                        'code' => $request->colors['code'][$index] ?? null,
                        'name' => $name,
                        'size' => $request->colors['size'][$index] ?? null,
                        'quantity' => $request->colors['quantity'][$index] ?? null,
                    ]);
                    $totalQuantity += $request->colors['quantity'][$index] ?? 0; // جمع الكميات
                }
            }
        }
        
        // تحديث `quantity` بعد حساب مجموع الألوان
        $product->update(['quantity' => $totalQuantity]);
        
    
        // ✅ 8. حفظ المواصفات (Specifications)
        if ($request->filled('specification_name')) {
            foreach ($request->specification_name as $index => $specName) {
                $product->specifications()->create([
                    'name' => $specName,
                    'value' => $request->specification_value[$index] ?? null,
                ]);
            }
        }
    
        // ✅ 9. حفظ الضرائب (Taxes)
        if ($request->filled('tax_names')) {
            foreach ($request->tax_names as $index => $taxName) {
                $product->taxes()->create([
                    'name' => $taxName,
                    'rate' => $request->tax_rates[$index] ?? null,
                ]);
            }
        }
    
      

        
        
        // ✅ 11. إعادة التوجيه بعد نجاح العملية
        return redirect()->route('admin_products.index')->with('success', 'Product created successfully.');
    }
    

    public function edit(Product $product)
{
    $categories = Category::all();
    $brands = Brand::all();
    $coupons = Coupon::all();
    $relatedProducts = Product::where('id', '!=', $product->id)->get();

    return view('admin.products.edit', compact('product', 'categories', 'brands', 'coupons', 'relatedProducts'));
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
