<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class GalleriesController extends Controller
{
    public function index()
    {

        $data = QueryModelsAll('Gallery')->get();
        return view('admin.galleries.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(storage_path('app/public/galleries'), $imageName);
            Gallery::create([
                'photo' => $imageName,
            ]);


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
        $row = Gallery::findorfail($id);
        return view('admin.galleries.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $galleries = Gallery::findOrFail($request->id);

            if (isset($request->photo)) {
                if (isset($request->old_file)) {
                    if (file_exists(storage_path('app/public/galleries/' . $request->old_file))) {
                        File::delete(storage_path('app/public/galleries/' . $request->old_file));
                    }

                    $imageName = time() . '.' . $request->photo->extension();
                    $request->photo->move(storage_path('app/public/galleries'), $imageName);
                }
            }


            Gallery::findorfail($request->id)->update([

                'photo' => $imageName ?? $galleries->photo,

            ]);


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
            if (file_exists(storage_path('app/public/galleries/' . $request->old_file))) {
                File::delete(storage_path('app/public/galleries/' . $request->old_file));
            }
        }
        Gallery::destroy($request->id);
        Session::flash('message', config('app.deleted'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
