<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = queryModels('Address', [], ['perPage' => 10, 'page' => request('page', 1)], ['user']);
        return view('admin.addresses.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        Address::create($request->validated());
        return redirect()->route('addresses.index')->with('success', 'Address created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $address = Address::with('user')->findOrFail($id);
        return view('admin.addresses.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $address = Address::findOrFail($id);
        return view('admin.addresses.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, $id)
    {
        $address = Address::findOrFail($id);

        $address->update($request->validated());

        return redirect()->route('addresses.index')->with('success', 'Address updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully.');
    }
}
