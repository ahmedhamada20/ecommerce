<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpecialProductsRequest;
use App\Models\SpecialProducts;
use Illuminate\Http\Request;

class SpecialProductsController extends Controller
{
    public function index()
    {
        $data = queryModels('SpecialProducts', [], ['perPage' => 20]);
        return view('admin.special_products.index', compact('data'));
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
    public function store(SpecialProductsRequest $request)
    {
        SpecialProducts::create($request->validated());
        return redirect()->route('admin_special_products.index')->with('success', "AdvertisementBanners  created successfully.");

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
    public function update(SpecialProductsRequest $request, string $id)
    {
        $specialProducts = SpecialProducts::findOrFail($request->id);
        $specialProducts->update($request->validated());
        return redirect()->route('admin_special_products.index')->with('success', "AdvertisementBanners  updated successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SpecialProducts::destroy(\request()->id);
        return redirect()->route('admin_special_products.index')->with('success', "AdvertisementBanners  deleted successfully.");

    }
}
