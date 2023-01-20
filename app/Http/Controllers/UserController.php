<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $users = User::all()->toArray();

        return view('users', compact('users'));

    }

    public function edit($id) {

        if (!$user = User::find($id))
            return redirect()->route('users.index');

        return view('edit', compact('user'));

    }

    public function update(Request $request, $id) {

    $user = User::find($id);
    $data = $request->only('name', 'email');

    $user->update($data);
    return redirect()->route('users.index');

    }
}