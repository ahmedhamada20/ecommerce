<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SlidersRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = queryModels('Slider', [], ['perPage' => 10, 'page' => request('page', 1)], ['user']);
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
    public function store(SlidersRequest $request)
    {
        Slider::create($request->validated());
        return redirect()->route('admin.sliders.index')->with('success', 'Reward created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row =  Slider::findorfail($id);
        return view('admin.sliders.show', compact('row'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row =  Slider::findorfail($id);
        return view('admin.sliders.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SlidersRequest $request, string $id)
    {
        $row =  Slider::findorfail($id);
        $row->update($request->validated());
        return redirect()->route('admin.sliders.index')->with('success', 'sliders updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row =  Slider::findorfail($id);
        $row->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'sliders deleted successfully.');

    }
}
