<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crm;
use Illuminate\Http\Request;

class CrmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = queryModels('Crm', [], [
            'perPage' => 20,
            'page' => 1
        ]);

        return view('admin.crm.index', compact('data'));
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
    public function store(Request $request)
    {
        try {
            Crm::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'phone'=> $request->phone ,
                'enquiry'=> $request->enquiry ?? null ,
            ]);
            return redirect()->route('admin_crm.index')->with('success', 'crm created successfully.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
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
        try {
            Crm::findOrFail($request->id)->update([
                'name'=> $request->name,
                'email'=> $request->email,
                'phone'=> $request->phone ,
                'enquiry'=> $request->enquiry ,
            ]);
            return redirect()->route('admin_crm.index')->with('success', 'crm updadted successfully.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Crm::findOrFail(\request()->id);
        $user->delete();
        return redirect()->route('admin_crm.index')->with('success', 'Crm deleted successfully.');

    }
}
