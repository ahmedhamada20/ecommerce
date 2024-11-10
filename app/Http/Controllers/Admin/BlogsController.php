<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = QueryModelsAll('Blog')->get();
        return view('admin.blogs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(storage_path('app/public/blogs'), $imageName);
            $data =  Blog::create([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'image' => $imageName,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'short_description_ar' => $request->short_description_ar,
                'short_description_en' => $request->short_description_en,
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
            ]);

            if ($data) {


                foreach ($request->FilenameMany as $photo) {
                    $path = $photo->store('blogs', 'public');
                    $image = new Photo();
                    $image->Filename = $path;
                    $image->photoable_id = $data->id;
                    $image->photoable_type = Blog::class;
                    $image->save();
                }
            }
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
        $row = Blog::findorfail($id);
        return view('admin.blogs.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $Brand = Blog::findOrFail($request->id);

            if (isset($request->image)) {
                if (isset($request->old_file)) {
                    if (file_exists(storage_path('app/public/blogs/' . $request->old_file))) {
                        File::delete(storage_path('app/public/blogs/' . $request->old_file));
                    }

                    $imageName = time() . '.' . $request->image->extension();
                    $request->image->move(storage_path('app/public/blogs'), $imageName);
                }
            }


            $data = Blog::findorfail($request->id)->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'image' => $imageName ?? $Brand->image,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'short_description_ar' => $request->short_description_ar,
                'short_description_en' => $request->short_description_en,
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
            ]);


            if ($request->has('FilenameMany')) {
                foreach ($request->FilenameMany as $photo) {
                    $path = $photo->store('blogs', 'public');
                    $image = new Photo();
                    $image->Filename = $path;
                    $image->photoable_id = $data->id;
                    $image->photoable_type = Blog::class;
                    $image->save();
                }
            }

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
        if (isset($request->old_file)) {
            if (file_exists(storage_path('app/public/blogs/' . $request->old_file))) {
                File::delete(storage_path('app/public/blogs/' . $request->old_file));
            }
        }
        Blog::destroy($request->id);
        Session::flash('message', config('app.deleted'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }


    public function status_blogs(Request $request)
    {
        $yourModel = Blog::find($request->id);
        $yourModel->publish = $request->input('active');
        $yourModel->save();
        return response()->json(['message' => 'تم تحديث الحالة بنجاح']);
    }


    public function blogs_remove_image(Request $request)
    {
        $get_data = Photo::where('photoable_id', $request->data_id)->where('photoable_type', Blog::class)->first();
        if ($get_data) {
            if (file_exists(storage_path('app/public/blogs/' . $get_data->Filename))) {
                File::delete(storage_path('app/public/blogs/' . $get_data->Filename));
            }
        }
        $get_data->delete();
        return response()->json(['message' => 'تم حذف الصوره بنجاح']);

    }
}
