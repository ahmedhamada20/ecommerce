<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = QueryModelsAll('Slider')->get();
        return view('admin.sliders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $imageName = time() . '.' . $request->photo->extension();
            $request->image->move(storage_path('app/public/sliders'), $imageName);
            Slider::create([
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'photo' => $imageName,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
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
        $row = Slider::findorfail($id);
        return view('admin.sliders.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $Brand = Slider::findOrFail($request->id);

            if(isset($request->photo)){
                if (isset($request->old_file)){
                    if (file_exists(storage_path('app/public/sliders/' . $request->old_file))) {
                        File::delete(storage_path('app/public/sliders/' . $request->old_file));
                    }

                    $imageName = time() . '.' . $request->image->extension();
                    $request->photo->move(storage_path('app/public/sliders'), $imageName);
                }
            }


            Slider::findorfail($request->id)->update([
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'photo' => $imageName ?? $Brand->photo,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
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
        if (isset($request->old_file)){
            if (file_exists(storage_path('app/public/sliders/' . $request->old_file))) {
                File::delete(storage_path('app/public/sliders/' . $request->old_file));
            }
        }
        Slider::destroy($request->id);
        Session::flash('message', config('app.deleted'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
