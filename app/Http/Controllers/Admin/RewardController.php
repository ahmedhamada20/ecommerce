<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RewardRequest;
use App\Models\Reward;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;


class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    function __construct()
//    {
//        $this->middleware('permission:Reward', ['only' => ['index','create','store','edit','update','destroy']]);
//    }
    public function index()
    {
        $data = queryModels('Reward', [], ['perPage' => 10, 'page' => request('page', 1)], []);
        return view('admin.rewards.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rewards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RewardRequest $request)
    {
        Reward::create($request->validated());
        return redirect()->route('admin_rewards.index')->with('success', 'Reward created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row =  Reward::findorfail($id);
        return view('admin.rewards.show', compact('row'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row =  Reward::findorfail($id);
        return view('admin.rewards.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RewardRequest $request, string $id)
    {
        $row =  Reward::findorfail($request->id);
        $row->update($request->validated());
        return redirect()->route('admin_rewards.index')->with('success', 'Reward updated successfully.');



    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row =  Reward::findorfail(\request()->id);
        $row->delete();
        return redirect()->route('admin_rewards.index')->with('success', 'Reward deleted successfully.');

    }

    public function updateRewardsStatus(Request $request)
    {

        $brand = Reward::find($request->id);
        if (!$brand) {
            return response()->json(['success' => false, 'message' => 'العلامة التجارية غير موجودة']);
        }
        $brand->is_active = $request->active;
        $brand->save();

        return response()->json(['success' => true, 'message' => 'تم تحديث الحالة بنجاح']);
    }
}
