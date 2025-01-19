<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
//    function __construct()
//    {
//        $this->middleware('permission:permission_index', ['only' => ['index','create']]);
//        $this->middleware('permission:permission_create', ['only' => ['store']]);
//        $this->middleware('permission:permission_edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:permission_deleted', ['only' => ['destroy']]);
//    }
    public function index()
    {
        $permissions = Permission::all();
//        dd($permissions);
        return view('admin.permissions.index', compact('permissions'));
    }


    public function store(Request $request)
    {
        Permission::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        return redirect()->back()
            ->with('success', "Permission Create Status");
    }


    public function update(Request $request, $id)
    {
        Permission::findById($request->id )->update([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        return redirect()->back()
            ->with('success', "Permission Updated Status");
    }


    public function destroy($id)
    {
        Permission::destroy($id);
        return redirect()->back()
            ->with('success', "Permission destroy Status");
    }
}
