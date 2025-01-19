<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Interfaces\RoleRepositoryInterface;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->input('name'), 'guard_name' => 'web']);
        $permissions = Permission::whereIn('id', $request->permission)->where('guard_name', 'web')->get();
        $role->syncPermissions($permissions);
        return redirect()->back()->with('success', "Role Created Successfully");
    }


    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function show($id)
    {
        $role = Role::find($id);
        $permissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('admin.roles.show', compact('role', 'permissions'));
    }


    public function update(Request $request, $id)
    {

//        try {

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $permissions = Permission::whereIn('id', $request->permission)->where('guard_name', 'web')->get();
        $role->syncPermissions($permissions);
        return redirect()->back()
            ->with('success', "Role updated Status");
//        } catch (\Exception $e) {
//            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
//        }

    }


    public function destroy($id)
    {
        try {
            Role::destroy($id);
            return redirect()->back()
                ->with('success', "Role destroy Status");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
