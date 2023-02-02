<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller {
    
    public function create() {
        
        return view('auth.login');
    }

    public function store() {

        $this->validate(request(), [
            'email' => 'required',
            'password' => 'required'
        ], [
           'email' => 'E-mail obrigatório',
           'password' => 'Senha obrigatória!' 
        ]);

        $user = User::where('email', request(['email']))->get();

        if (isset($user[0]->status) && $user[0]->status == 0){


            // return back()->withMessages([
            //     'message' => 'O e-mail está incorretoooo',
            // ]);
            return back()->with('warning','Usuário bloqueado!');
        }

        // dd(request(['email', 'password']));
        
        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->with('warning','Usuário ou senha incorretos!');

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