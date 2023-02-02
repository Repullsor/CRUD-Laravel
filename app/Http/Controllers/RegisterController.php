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
            //                  unique:table,column,execptionId === unique vai pesquisar na tabela passada pela coluna passada tirando  o registro passado
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
        ], [
           'required' => ':attribute obrigatório!',
           'unique' => 'O e-mail já está em uso, escolha outro',
           'password' => 'Crie e confirme a senha' 
        ], [
            'name' => 'Nome',
            'password' => 'Senha'
        ]);

        // dd(request(['password']));

        $user = User::create(request(['name', 'email', 'password']));

        $user->assignRole(3);

        auth()->login($user);
        return redirect()->to('/');
    }
}