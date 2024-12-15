<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Blog;
use App\Models\Brand;
use Illuminate\Http\Request;

class BlogController extends Controller
{
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
            'user_id' => auth()->id(),
        ]));
        return redirect()->route('blogs.index')
            ->with('success', "Blog '{$blog->name_en}' created successfully.");
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
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest  $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update($request->validated());
        return redirect()->route('blogs.index')
            ->with('success', "Blog '{$blog->name_en}' updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with('error', "Blog  deleted successfully.");
    }
}
