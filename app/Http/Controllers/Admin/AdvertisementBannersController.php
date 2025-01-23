<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdvertisementBannersRequest;
use App\Models\AdvertisementBanners;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdvertisementBannersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = queryModels('AdvertisementBanners', [], ['perPage' => 20]);
        return view('admin.advertisement_banners.index', compact('data'));
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
    public function store(AdvertisementBannersRequest $request)
    {
        $AdvertisementBanners = AdvertisementBanners::create($request->validated());

        if($AdvertisementBanners){
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('advertisementBanners', 'public');
                Photo::create([
                    'filename' => $imagePath,
                    'photoable_type' => AdvertisementBanners::class,
                    'photoable_id' => $AdvertisementBanners->id,
                ]);
            }
        }
        return redirect()->route('admin_advertisement_banners.index')->with('success', "AdvertisementBanners  created successfully.");

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
    public function update(AdvertisementBannersRequest $request, string $id)
    {
        $advertisementBanners = AdvertisementBanners::findOrFail($request->id);
        $advertisementBanners->update($request->validated());
        if ($request->hasFile('image')) {
            $oldPhoto = $advertisementBanners->photo()->first();
            if ($oldPhoto) {
                if (Storage::exists('public/' . $oldPhoto->filename)) {
                    Storage::delete('public/' . $oldPhoto->filename);
                }
                $oldPhoto->delete();
            }
            $image = $request->file('image');
            $imagePath = $image->store('blogs', 'public');
            Photo::create([
                'filename' => $imagePath,
                'photoable_type' => AdvertisementBanners::class,
                'photoable_id' => $advertisementBanners->id,
            ]);
        }
        return redirect()->route('admin_advertisement_banners.index')->with('success', "AdvertisementBanners  updated successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AdvertisementBanners::destroy(\request()->id);
        return redirect()->route('admin_advertisement_banners.index')->with('success', "AdvertisementBanners  deleted successfully.");

    }

    public function updateAdvertisementBannersStatus(Request $request)
    {

        $brand = AdvertisementBanners::find($request->id);
        if (!$brand) {
            return response()->json(['success' => false, 'message' => 'العلامة التجارية غير موجودة']);
        }
        $brand->active = $request->active;
        $brand->save();

        return response()->json(['success' => true, 'message' => 'تم تحديث الحالة بنجاح']);
    }
}
