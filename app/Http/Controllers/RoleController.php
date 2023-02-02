<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    function __construct() {

        $this->middleware('permission:role-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['delete']]);

    }

    public function index() {

        $roles = Role::all()->toArray();

        return view('roles.roles', compact('roles'));

    }

    public function create() {
        // $permission = Permission::get();
        $permissionUser = Permission::where('name', 'like', '%user%')->get();

        $permissionProduct = Permission::where('name', 'like', '%product%')->get();

        $permissionRole = Permission::where('name', 'like', '%role%')->get();

        return view('roles.create', compact('permissionUser', 'permissionProduct', 'permissionRole'))->with('success', 'Role criada com sucesso!');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ], [
            'name' => 'Nome é obrigatório',
            'unique' => 'O nome já existe',
            'permission' => 'Pelo menos uma :attribute é obrigatória'
        ], [
            'name' => 'Nome',
            'permission' => 'permissão'
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')->with('success', 'Role criada com sucesso!');
    }

    public function destroy($id) {
        Role::where('id',$id)->delete();
        return redirect()->route('roles.index')->with('error', 'Role excluida!');
    }

    public function show($id) {

        $role = Role::find($id);

        $rolePermissionsUser = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->where('name', 'like', '%user%')
            ->get();

        $rolePermissionsProduct = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->where('name', 'like', '%product%')
            ->get();

        $rolePermissionsRole = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->where('name', 'like', '%role%')
            ->get();

        return view('roles.show', compact('role', 'rolePermissionsUser', 'rolePermissionsProduct', 'rolePermissionsRole'));
    }

    public function edit($id) {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        $permissionUser = Permission::where('name', 'like', '%user%')->get();

        $permissionProduct = Permission::where('name', 'like', '%product%')->get();

        $permissionRole = Permission::where('name', 'like', '%role%')->get();
    
        return view('roles.edit', compact('role', 'permission', 'rolePermissions', 'permissionUser', 'permissionProduct', 'permissionRole'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'name' => 'required|unique:roles,name,' . $id,
            'permission' => 'required',
        ], [
            'name' => 'Nome é obrigatório',
            'unique' => 'O nome já existe',
            'permission' => 'Pelo menos uma permissão é obrigatória!'
        ]);
    
        $roles = Role::find($id);
        $roles->name = $request->input('name');
        $roles->save();
    
        $roles->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')->with('success', 'Role atualizada!');

    }

    

    
}
