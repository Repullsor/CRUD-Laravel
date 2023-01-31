<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    function __construct() {

        $this->middleware('permission:user-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-block', ['only' => ['block']]);
        $this->middleware('permission:user-unlock', ['only' => ['unlock']]);
        $this->middleware('permission:user-delete', ['only' => ['delete']]);

    }


    public function index() {

        $users = User::all();

        return view('users', compact('users'));

    }

    public function edit($id) {

        if (!$user = User::find($id))
            return redirect()->route('users.index');

        $roles = Role::pluck('name','id')->all();
        // dd($roles);
        $userRole = "";

        if(isset($user->roles)) {
            
            $userRole = $user->roles->pluck('name', 'id')->all();

        }
    
        return view('edit', compact('user', 'roles', 'userRole'));

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

    DB::table('model_has_roles')->where('model_id',$id)->delete();
    
    $user->assignRole($request->input('roles'));

    return redirect()->route('users.index')->with('success', 'O usuário foi atualizado!');

    }

    public function show($id) {

        $user = User::find($id);
        //dd($user);
        return view('show', compact('user'));
    }

    public function destroy($id) {

        if(auth()->user()->id != $id) {
            $user = User::find($id);
            $user->delete();
        }

        return back()->with('error', 'O usuário foi excluido!');

    }

    public function block($id) {

        if(auth()->user()->id != $id) {
            
         User::where('id', $id)->update(['status'=>0]);

        }

        return redirect()->route('users.index')->with('warning', 'O usuário foi bloqueado!');

    }

    public function unlock($id) {

        User::where('id', $id)->update(['status'=>1]);
        return redirect()->route('users.index')->with('warning', 'O usuário foi desbloqueado!');;

    }

    
    }