<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Hyperlink;
use App\Models\Photo;
use App\Models\Setting;
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
            Photo::where('photoable_type', Slider::class)->where('photoable_id', $request->hypertoable_id)->delete();
            return redirect()->back()->with('success', 'hyper link edit successfully.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }


    public function settings()
    {
        $setting = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('setting'));
    }

    public function settings_update(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            if (is_array($value) && isset($value['en'], $value['ar'])) {
                $data[$key] = [
                    'en' => $value['en'] ?? '',
                    'ar' => $value['ar'] ?? '',
                ];
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $path = $file->store('public/settings');
                if ($path) {
                    $data[$key] = Storage::url($path);

                    Photo::updateOrCreate([
                        'photoable_id' => 1
                    ], [
                        'filename' => $path,
                        'photoable_type' => Setting::class,
                        'photoable_id' => 1
                    ]);
                }
            }
        }

        $setting = new Setting();
        foreach ($data as $key => $value) {
            $setting->updateOrCreate(
                ['key' => $key],
                ['value' => is_array($value) ? json_encode($value) : $value]
            );
        }
        return redirect()->back()->with('success', 'Setting  successfully.');

    }

}
