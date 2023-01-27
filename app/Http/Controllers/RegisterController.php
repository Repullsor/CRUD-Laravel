<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Contracts\Permission;

class RegisterController extends Controller {
    
    public function create() {
        
        return view('auth.register');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        // dd(request(['password']));

        $user = User::create(request(['name', 'email', 'password']));

        $user->assignRole(3);

        auth()->login($user);
        return redirect()->to('/');
    }
}