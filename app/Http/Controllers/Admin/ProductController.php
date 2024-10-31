<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Photo;
use App\Models\Product;
use App\Models\ProductColorImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function index()
    {
        $data = QueryModelsAll('Product')->paginate(50);
        return view('admin.products.index', compact('data'));
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
        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        dd(json_encode($request->columns));
        try {
            DB::beginTransaction();
            $data = Product::create([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'brand_id' => $request->brand_id,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'notes' => $request->notes,
                'SKU' => $request->SKU,
                'slug' => str_replace(' ', '_', $request->name_ar) .'_'. str_replace(' ', '_', $request->name_en),
                'quantity' => $request->quantity,
                'price' => $request->price,
                'discount_price' => $request->discount,
                'features' => 1,
                'stock' => 1,
                'publish' => true,
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
                'columns' => json_encode($request->columns)
            ]);
            if ($data){
                $data->categories()->attach($request->category_id);
                $data->tags()->attach($request->tags);
                $data->sizes()->attach($request->size);
                $data->colors()->attach($request->color);

                foreach ($request->FilenameMany as $photo){
                    $path = $photo->store('products','public');
                    $image = new Photo();
                    $image->Filename = $path;
                    $image->photoable_id = $data->id;
                    $image->photoable_type = Product::class;
                    $image->save();
                }
            }



            Session::flash('message', config('app.messages'));
            Session::flash('alert-class', 'alert-success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::findorfail($id);
        return view('admin.products.image_color',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::findorfail($id);
        return view('admin.products.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();
            $data = Product::findOrFail($request->id);
            $updated = $data->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'brand_id' => $request->brand_id,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'notes' => $request->notes,
                'SKU' => $request->SKU,
                'slug' => str_replace(' ', '_', $request->name_ar) .'_'. str_replace(' ', '_', $request->name_en),
                'quantity' => $request->quantity,
                'price' => $request->price,
                'discount_price' => $request->discount,
                'features' => 1,
                'stock' => 1,
                'publish' => true,
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
                'columns' => json_encode($request->columns)
            ]);

            if ($updated) {
                if ($request->has('category_id')) {
                    $data->categories()->sync($request->category_id);
                }
                if ($request->has('tags')) {
                    $data->tags()->sync($request->tags);
                }
                if ($request->has('size')) {
                    $data->sizes()->sync($request->size);
                }
                if ($request->has('color')) {
                    $data->colors()->sync($request->color);
                }

                if ($request->has('FilenameMany')) {
                    foreach ($request->FilenameMany as $photo) {
                        $path = $photo->store('products', 'public');
                        $image = new Photo();
                        $image->Filename = $path;
                        $image->photoable_id = $data->id;
                        $image->photoable_type = Product::class;
                        $image->save();
                    }
                }
            }




            Session::flash('message', config('app.messages'));
            Session::flash('alert-class', 'alert-success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();

            $checkOrders = OrderDetails::where('product_id',$request->id)->first();

            if ($checkOrders){
                Session::flash('message', config('app.product_orders'));
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();
            }
            $get_image =  Photo::where('photoable_id',$request->id)->where('photoable_type',Product::class)->get();

            foreach ($get_image as $item){
                if (file_exists(storage_path('app/public/' . $item->Filename))) {
                    File::delete(storage_path('app/public/' . $item->Filename));
                }
            }
            Photo::where('photoable_id',$request->id)->where('photoable_type',Product::class)->delete();
            Product::destroy($request->id);

            Session::flash('message', config('app.deleted'));
            Session::flash('alert-class', 'alert-success');
            DB::commit();
            return redirect()->back();

        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }

    public function status_products(Request $request)
    {
        $yourModel = Product::find($request->id);
        $yourModel->publish = $request->input('publish');
        $yourModel->save();
        return response()->json(['message' => 'تم تحديث الحالة بنجاح']);
    }


    public function addQuantity(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        Product::findOrFail($validated['id'])->increment('quantity', $validated['quantity']);
        Session::flash('message', config('app.addQuantity'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function add_image_color_products(Request $request)
    {

        try {
            $validated = $request->validate([
                'id' => 'required|exists:products,id',
                'images' => 'required|array',
                'images.*.*' => 'image|mimes:jpeg,png,jpg|max:2048',
                'colors' => 'required|array',
                'colors.*' => 'exists:colors,id',
                'quantities' => 'nullable|array',
                'quantities.*' => 'integer|min:1'
            ]);

            $productId = $validated['id'];

            foreach ($validated['colors'] as $index => $colorId) {
                if (isset($validated['images'][$colorId])) {
//                    $quantity = $validated['quantities'][$index];
                    foreach ($validated['images'][$colorId] as $image) {
                        $imagePath = $image->store('product_images');
                        ProductColorImage::create([
                            'product_id' => $productId,
                            'color_id' => $colorId,
                            'image_path' => $imagePath,
                            'quantity' => 1
                        ]);
                    }
                }
            }

            Session::flash('message', config('app.addImages'));
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

}
