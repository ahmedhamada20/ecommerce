<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Photo;
use App\Models\RateComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

//    function __construct()
//    {
//        $this->middleware('permission:Blog', ['only' => ['index','create','store','edit','update','destroy']]);
//    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = queryModels('Blog', [], ['perPage' => 20]);
        return view('admin.blogs.index', compact('blogs'));
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
    public function store(BlogRequest $request)
    {
        $blog =Blog::create(array_merge($request->validated(), [
            'user_id' => auth()->check() ?  auth()->id() : 1    ,
        ]));

        if($blog){
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('blogs', 'public');
                Photo::create([
                    'filename' => $imagePath,
                    'photoable_type' => Blog::class,
                    'photoable_id' => $blog->id,
                ]);
            }
        }
        return redirect()->route('admin_blogs.index')
            ->with('success', "Blog '{$blog->name_en}' created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Blog::findOrFail($id);
        return view('admin.blogs.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest  $request, string $id)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->update($request->validated());
        if ($request->hasFile('image')) {
            $oldPhoto = $blog->photo()->first();
            if ($oldPhoto) {
                if (Storage::exists('public/' . $oldPhoto->filename)) {
                    Storage::delete('public/' . $oldPhoto->filename);
                }
                $oldPhoto->delete();
            }
            $image = $request->file('image');
            $imagePath = $image->store('blogs', 'public');
            Photo::create([
                'filename' => $imagePath,
                'photoable_type' => Blog::class,
                'photoable_id' => $blog->id,
            ]);
        }
        return redirect()->route('admin_blogs.index')
            ->with('success', "Blog '{$blog->name_en}' updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail(\request()->id);
        $blog->delete();
        return redirect()->route('admin_blogs.index')->with('success', "Blog  deleted successfully.");
    }

    public function updateBlogsStatus(Request $request)
    {
        $brand = Blog::find($request->id);
        if (!$brand) {
            return response()->json(['success' => false, 'message' => 'العلامة التجارية غير موجودة']);
        }
        $brand->active = $request->active;
        $brand->save();
        return response()->json(['success' => true, 'message' => 'تم تحديث الحالة بنجاح']);
    }

    public function updateCommentsStatus(Request $request)
    {

        $brand = RateComment::find($request->id);
        if (!$brand) {
            return response()->json(['success' => false, 'message' => 'العلامة التجارية غير موجودة']);
        }
        $brand->status = $request->active;
        $brand->save();
        return response()->json(['success' => true, 'message' => 'تم تحديث الحالة بنجاح']);
    }

    public function deletedComments($id)
    {
        $data = RateComment::find($id);
        if ($data){
            Blog::where('id', $data->commentable_id)->decrement('count_comments');
            $brand = RateComment::destroy($id);
        }
        return redirect()->back()->with('success', "comments  deleted successfully.");
    }
}
