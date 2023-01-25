<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index() {

        $roles = Role::all()->toArray();

        return view('roles.roles', compact('roles'));

    }

    public function create() 
    {
        // $permission = Permission::get();
        $permissionUser = Permission::where('name', 'like', '%user%')->get();

        $permissionProduct = Permission::where('name', 'like', '%product%')->get();

        $permissionRole = Permission::where('name', 'like', '%role%')->get();
        return view('roles.create', compact('permissionUser', 'permissionProduct', 'permissionRole'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }

    public function destroy($id)
    {
        Role::where('id',$id)->delete();
        return redirect()->route('roles.index');
    }

    
}
