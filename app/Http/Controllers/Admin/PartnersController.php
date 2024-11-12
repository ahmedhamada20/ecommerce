<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = QueryModelsAll('Partner')->get();
        return view('admin.partners.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(storage_path('app/public/partners'), $imageName);
            Partner::create([
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
        $row = Partner::findorfail($id);
        return view('admin.partners.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $partners = Partner::findOrFail($request->id);

            if (isset($request->photo)) {
                if (isset($request->old_file)) {
                    if (file_exists(storage_path('app/public/partners/' . $request->old_file))) {
                        File::delete(storage_path('app/public/partners/' . $request->old_file));
                    }

                    $imageName = time() . '.' . $request->photo->extension();
                    $request->photo->move(storage_path('app/public/partners'), $imageName);
                }
            }


          Partner::findorfail($request->id)->update([

                'photo' => $imageName ?? $partners->photo,

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
            if (file_exists(storage_path('app/public/partners/' . $request->old_file))) {
                File::delete(storage_path('app/public/partners/' . $request->old_file));
            }
        }
        Partner::destroy($request->id);
        Session::flash('message', config('app.deleted'));
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
