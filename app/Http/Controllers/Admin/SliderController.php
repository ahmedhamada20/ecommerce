<?php

namespace App\Http\Controllers\Admin;

use App\Enums\HyperlinksEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SlidersRequest;
use App\Models\Hyperlink;
use App\Models\Photo;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $sliders = Slider::create($request->validated());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('sliders', 'public');
            Photo::create([
                'filename' => $imagePath,
                'photoable_type' => Slider::class,
                'photoable_id' => $sliders->id,
            ]);
        }
        return redirect()->route('admin_sliders.index')->with('success', 'Reward created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data =  Slider::findorfail($id);
//       $hypers = Hyperlink::where('hypertoable_id',$id)->where('hypertoable_type',Slider::class)->where('type',HyperlinksEnum::SLIDER)->get();
//       dd($hypers);
        return view('admin.sliders.show', compact('data'));

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
        $row =  Slider::findorfail($request->id);
        $row->update($request->validated());
        if ($request->hasFile('image')) {
            $oldPhoto = $row->photo()->first();
            if ($oldPhoto) {
                if (Storage::exists('public/' . $oldPhoto->filename)) {
                    Storage::delete('public/' . $oldPhoto->filename);
                }
                $oldPhoto->delete();
            }
            $image = $request->file('image');
            $imagePath = $image->store('sliders', 'public');
            Photo::create([
                'filename' => $imagePath,
                'photoable_type' => Slider::class,
                'photoable_id' => $row->id,
            ]);
        }
        return redirect()->route('admin_sliders.index')->with('success', 'sliders updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row =  Slider::findorfail(\request()->id);
        $row->delete();
        return redirect()->route('admin_sliders.index')->with('success', 'sliders deleted successfully.');

    }

    public function updateSlidersStatus(Request $request)
    {

        $brand = Slider::find($request->id);
        if (!$brand) {
            return response()->json(['success' => false, 'message' => 'العلامة التجارية غير موجودة']);
        }
        $brand->is_active = $request->active;
        $brand->save();

        return response()->json(['success' => true, 'message' => 'تم تحديث الحالة بنجاح']);
    }
}
