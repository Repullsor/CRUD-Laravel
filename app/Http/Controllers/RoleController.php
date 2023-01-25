<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index() {

        $roles = Role::all()->toArray();

        return view('roles.roles', compact('roles'));

    }
}
