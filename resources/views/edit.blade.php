@extends('layouts.app')

@section('title', 'Edit')

@section('content')


    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">

        <h1 class="text-3xl text-center font-bold">Editar Usuário</h1>

        <form class="mt-4" method="post" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <input type="text"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
                text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Novo Nome" id="name" name="name" value="{{ old('name') ?? $user['name'] }}">

            @error('name')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">{{ $message }}</p>
            @enderror

            <input type="email"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
                text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Novo e-mail" id="email" name="email" value="{{ old('email') ?? $user['email'] }}">

            @error('email')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">{{ $message }}</p>
            @enderror

            <input type="password"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
                text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Nova Senha" id="password" name="password">

            @error('password')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">{{ $message }}</p>
            @enderror

            <input type="password"
                class="border border-gray-200 rounded-md bg-gray-200 
                w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Confirme a nova senha" id="password_confirmation" name="password_confirmation">

                <label for="pet-select" >Atribua uma role:</label>
                 {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control')) !!}
                 
            <div class="" style="display: flex; justify-content: center;">
                    <a href="{{ route('users.index') }}"
                        class="font-bold text-white
                        py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600" style=" margin-right: 10px;">Voltar</a>
        
                    <button type="submit"
                    class="font-bold text-white
                    py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600">Salvar</button>
                </div>
        </form>

    </div>

        


    </div>

@endsection
