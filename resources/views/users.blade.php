@extends('layouts.app')

@section('title', 'List')

@section('content')

<h1 class="text-center">Lista de Usuários</h1>

<style>

    th, tr{
        text-align: center;
        vertical-align: middle;
    }

</style>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" style="text-align: center;">
                <tr scope="col" class="px-6 py-3">
                    <th scope="col" class="px-6 py-3">Nº</th>
                    <th scope="col" class="px-6 py-3">Nomes</th>
                    <th scope="col" class="px-6 py-3">E-mail</th>
                    <th scope="col" class="px-6 py-3">Ações</th>
                </tr>

                @foreach ($users as $user)
                    
                <tr style="height: 50px">
                    <td scope="col" class="px-6 py-3">{{ $user['id'] }}</td>
                    <td scope="col" class="px-6 py-3">{{ $user['name'] }}</td>
                    <td scope="col" class="px-6 py-3">{{ $user['email'] }}</td>
                    <td>
                        <a href="#" class="font-bold text-white
                        py-3 px-4 rounded-md bg-blue-500 hover:bg-blue-600">Ver</a>
                        <a href="/edit/{{$user['id']}}" class="font-bold text-white
                        py-3 px-4 rounded-md bg-blue-500 hover:bg-blue-600">Editar</a>
                        <a href="#" class="font-bold text-white
                        py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">Excluir</a>
                    </td>
                </tr>
                @endforeach

            </thead>
        </table>
    </div>

@endsection