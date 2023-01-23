@extends('layouts.app')

@section('title', 'Edit')

@section('content')


    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">

        <h1 class="text-3xl text-center font-bold">Editar Usuário</h1>

        <form class="mt-4" method="post" action="{{ route('edit.update', $user->id) }}">
            @csrf
            @method('PUT')
            <input type="text"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
                text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Novo Nome" id="name" name="name" value="{{ $user['name'] }}">

            <input type="email"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
                text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Novo e-mail" id="email" name="email" value="{{ $user['email'] }}">

            <input type="password"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
                text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Nova Senha" id="password" name="password">

            <input type="password"
                class="border border-gray-200 rounded-md bg-gray-200 
                w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Confirme a nova senha" id="password_confirmation" name="password_confirmation">

                <a href="{{ route('users.index') }}"
                class="font-bold text-white
                py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600" style="margin-left: 100px;">Voltar</a>

                <button type="submit"
                class="font-bold text-white
                py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600">Salvar</button>


        </form>


    </div>

@endsection
