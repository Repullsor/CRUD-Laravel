@extends('layouts.app')

@section('title', 'Roles')

@section('content')

<div class="ml-auto flex justify-end font-bold text-white
                py-3 px-4 rounded-md bg-green-500 hover:bg-green-600 flex center" style="width: 150px; margin-block: 10px 0; margin-right: 62px">
                <a href="{{ route('create') }}">Criar Nova Role</a>
    </div>

    <h1 class="text-center font-bold text-xl">Gerenciamento das Roles</h1>

    <style>
        th,
        tr {
            text-align: center;
            vertical-align: middle;
        }
    </style>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                style="text-align: center;">
                <tr scope="col" class="px-6 py-3">
                    <th scope="col" class="px-6 py-3">Nº</th>
                    <th scope="col" class="px-6 py-3">Nome</th>
                    <th scope="col" class="px-6 py-3">Ações</th>
                </tr>

                @php
                    $i = 1;
                @endphp
                
                @foreach ($roles as $role)
                    <tr style="height: 50px">
                        <td scope="col" class="px-6 py-3">{{ $i++ }}</td>
                        <td scope="col" class="px-6 py-3"></td>
                        
                        
                        <td>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                            <a href="/products/show/"
                                class="font-bold text-white py-3 px-4 rounded-md bg-blue-500 hover:bg-blue-600">Ver</a>
                            <a href="/products/edit/"
                                class="font-bold text-white py-3 px-4 rounded-md bg-blue-500 hover:bg-blue-600">Editar</a>
                                <button type="submit"
                                    class="font-bold text-white py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">EXCLUIR</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </thead>
        </table>
    </div>
    <div class="font-bold text-white
                py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600" style="margin: 10px auto; width: 80px; text-align: center">
                <a href="{{ route('screen') }}">Voltar</a>
    </div>


@endsection
