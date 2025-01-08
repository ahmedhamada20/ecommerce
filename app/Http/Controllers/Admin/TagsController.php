<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = queryModels('Tag', [], ['perPage' => 20]);
        return view('admin.tags.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->validated());
        return redirect()->route('admin_tags.index')->with('success', 'tags created successfully.');

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
    public function update(TagRequest $request, string $id)
    {
        $tags = Tag::findOrFail($request->id);
        $tags->update($request->validated());
        return redirect()->route('admin_tags.index')->with('success', 'tags updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $checkProducts = DB::table('products_tags')->where('tag_id', \request()->id)->first();
        if ($checkProducts){
            return redirect()->route('admin_categories.index')->with('error', 'This tag is related to products. Please delete the products first.');
        }
        Tag::destroy(\request()->id);
        return redirect()->route('admin_tags.index')->with('success', 'tags deleted successfully.');

    }
}
