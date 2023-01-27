@extends('layouts.app')

@section('title', 'Show')

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" style="text-align: center;">
            <tr scope="col" class="px-6 py-3">
                <th scope="col" class="px-6 py-3">Nº</th>
                <th scope="col" class="px-6 py-3">Nome</th>
                <th scope="col" class="px-6 py-3">E-mail</th>
                <th scope="col" class="px-6 py-3">Roles</th>
                <th scope="col" class="px-6 py-3">Ações</th>
            </tr>

                
            <tr style="height: 50px">
                <td scope="col" class="px-6 py-3">{{ $user['id'] }}</td>
                <td scope="col" class="px-6 py-3">{{ $user['name'] }}</td>
                <td scope="col" class="px-6 py-3">{{ $user['email'] }}</td>
                <td scope="col" class="px-6 py-3">
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $item)
                            <label>{{ $item }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    @can('user-edit')
                        <a href="/edit/{{$user['id']}}" class="font-bold text-white
                        py-3 px-4 rounded-md bg-blue-500 hover:bg-blue-600">Editar</a>
                    @endcan
                    
                    @can('user-delete')
                        <button type="submit"
                        class="font-bold text-white py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">EXCLUIR</button>
                    @endcan
                    
                </td>
            </tr>
            
            

        </thead>
    </table>
    
</div>
<div class="font-bold text-white
    py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600" style="margin: 10px auto; width: 80px; text-align: center">
    <a href="{{ route('users.index') }}">Voltar</a>
</div>


@endsection