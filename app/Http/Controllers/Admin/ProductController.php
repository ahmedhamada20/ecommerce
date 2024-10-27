<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

//        dd($request->all());
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
                'slug' => str_replace(' ', '_', $request->name_ar) . str_replace(' ', '_', $request->name_en),
                'quantity' => $request->quantity,
                'price' => $request->price,
                'discount_price' => $request->discount,
                'features' => true,
                'publish' => true,
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
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
            DB::commit();
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
