<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Hyperlink;
use App\Models\Photo;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function hyperLink(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'link' => 'required|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = Hyperlink::create([
                'type' => $request->type,
                'hypertoable_type' => $request->hypertoable_type,
                'hypertoable_id' => $request->hypertoable_id,
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'link' => $request->link,
            ]);

            if ($data) {
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imagePath = $image->store('sliders', 'public');
                    Photo::create([
                        'filename' => $imagePath,
                        'photoable_type' => Slider::class,
                        'photoable_id' => $request->hypertoable_id,
                    ]);
                }
            }
            return redirect()->back()->with('success', 'hyper link created successfully.');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }


    public function hyperLink_edit(Request $request)
    {
        try {
            $data = Slider::findorfail($request->hypertoable_id);
            Hyperlink::findorfail($request->id)->update([
                'type' => $request->type,
                'hypertoable_type' => $request->hypertoable_type,
                'hypertoable_id' => $request->hypertoable_id,
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'link' => $request->link,
            ]);
            if ($request->hasFile('image')) {
                $oldPhoto = $data->photo()->first();
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
                    'photoable_id' => $request->hypertoable_id,
                ]);
            }
            return redirect()->back()->with('success', 'hyper link edit successfully.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function hyperLink_deleted(Request $request)
    {
        try {
            $data = Slider::findorfail($request->hypertoable_id);
            $oldPhoto = $data->photo()->first();
            if ($oldPhoto) {
                if (Storage::exists('public/' . $oldPhoto->filename)) {
                    Storage::delete('public/' . $oldPhoto->filename);
                }
                $oldPhoto->delete();
            }
            Hyperlink::destroy($request->id);
            Photo::where('photoable_type',Slider::class)->where('photoable_id',$request->hypertoable_id)->delete();
            return redirect()->back()->with('success', 'hyper link edit successfully.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }


    }
}
