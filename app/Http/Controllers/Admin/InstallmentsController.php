<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InstallmentRequest;
use App\Models\Installment;
use Illuminate\Http\Request;

class InstallmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = queryModels('Installment', [], ['perPage' => 20]);
        return view('admin.installments.index', compact('data'));
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
    public function store(InstallmentRequest $request)
    {
        Installment::create($request->validated());
        return redirect()->route('admin_installments.index')->with('success', 'Installment created successfully.');

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
    public function update(InstallmentRequest $request, string $id)
    {
        $row =  Installment::findorfail($request->id);
        $row->update($request->validated());
        return redirect()->route('admin_installments.index')->with('success', 'Installment updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row =  Installment::findorfail(\request()->id);
        $row->delete();
        return redirect()->route('admin_installments.index')->with('success', 'Installment deleted successfully.');

    }

    public function updateInstallmentStatus(Request $request)
    {

        $brand = Installment::find($request->id);
        if (!$brand) {
            return response()->json(['success' => false, 'message' => 'العلامة التجارية غير موجودة']);
        }
        $brand->active = $request->active;
        $brand->save();

        return response()->json(['success' => true, 'message' => 'تم تحديث الحالة بنجاح']);
    }
}
