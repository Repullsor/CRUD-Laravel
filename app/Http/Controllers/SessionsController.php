<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller {
    
    public function create() {
        
        return view('auth.login');
    }

    public function store() {


        $user = User::where('email', request(['email']))->get();

        if (isset($user[0]->status) && $user[0]->status == 0){


            // return back()->withErrors([
            //     'message' => 'O e-mail está incorretoooo',
            // ]);
            return back()->with('error','Usuário bloqueado!');
        }

        // dd(request(['email', 'password']));
        
        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->with('error','Email ou senha incorretos');

        } else {

            if(auth()->user()->role == 'admin') {
                return redirect()->route('screen');
            } else {
                return redirect()->route('screen');
            }
        }
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/');
    }

    

    
}