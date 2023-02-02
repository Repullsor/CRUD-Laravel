@extends('layouts.app')

@section('title', 'Roles')

@section('content')

@can('role-create')
    <div  style="width: 150px; margin-block: 10px 0; margin-left: 84%">
                <a href="{{ route('roles.create') }}" class="ml-auto flex justify-end font-bold text-white
                py-3 px-4 rounded-md bg-green-500 hover:bg-green-600 flex center">Criar Nova Role</a>
    </div>
@endcan

    <h1 class="text-center font-bold text-xl my-5">Gerenciamento das Roles</h1>

    <style>
        th, tr {
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
                        <td scope="col" class="px-6 py-3">{{ $role['name'] }}</td>
                        
                        <td>
                            <form action="{{ route('roles.delete', $role['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                @can('role-list')
                                    <a href="/roles/show/{{ $role['id'] }}"
                                class="font-bold text-white py-3 px-4 rounded-md bg-blue-500 hover:bg-blue-600">Ver</a>
                                @endcan

                            @can('role-edit')
                                 <a href="/roles/edit/{{ $role['id'] }}"
                                class="font-bold text-white py-3 px-4 rounded-md bg-blue-500 hover:bg-blue-600">Editar</a>
                            @endcan
                           
                            @can('role-delete')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir a Role?')"
                                    class="font-bold text-white py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">EXCLUIR</button>
                            @endcan
                            </form>
                        </td>
                    </tr>
                @endforeach

            </thead>
        </table>
    </div>
    <div style="margin: 20px auto; width: 80px; text-align: center">
                <a href="{{ route('screen') }}" class="font-bold text-white
                py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600">Voltar</a>  
    </div>
@endsection
