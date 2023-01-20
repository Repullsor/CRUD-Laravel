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
    $password = $request->input('password');
    if($password)
        $data['password'] = $password; //Não precisa encriptar

    // $user = User::find($id);
    // $password = $request->input('password');
    // if($password)
    //     $data=$request->only('name', 'email', 'password');
    // else   
    //     $data=$request->only('name', 'email');
    

    // if (trim($request->password) == '') {
    //     $data=$request->expect('password');
        
    // } else {

    //     $data=$request->all();
    //     $data['password'] = bcrypt($request->password);
    // }
    

    $user->update($data);
    return redirect()->route('users.index');

    }

    public function show($id) {

        $user = User::find($id);
        //dd($user);
        return view('show', compact('user'));
    }

    public function destroy(User $user) {

        $user->delete();
        return back();

    }
}