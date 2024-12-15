<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = queryModels('Currency', [], ['perPage' => 10, 'page' => 1], []);
        return view('admin.currencies.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.currencies.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyRequest $request)
    {
        Currency::create($request->validated());
        return redirect()->route('currencies.index')->with('success', 'Currency created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $currency = Currency::findOrFail($id);
        return view('admin.currencies.edit', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $currency = Currency::findOrFail($id);
        return view('admin.currencies.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrencyRequest $request, $id)
    {
        $currency = Currency::findOrFail($id);
        $currency->update($request->validated());
        return redirect()->route('currencies.index')->with('success', 'Currency updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();
        return redirect()->route('currencies.index')->with('success', 'Currency deleted successfully.');
    }
}
