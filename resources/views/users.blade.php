

@extends('layouts.app')

@section('title', 'Users')

@section('content')

    <h1 class="text-center font-bold text-xl my-5">Lista de Usuários</h1>

    <style>
        th,
        tr {
            text-align: center;
            vertical-align: middle;
        }
    </style>

    

    
    


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                style="text-align: center;">
                <tr scope="col" class="px-6 py-3">
                    <th scope="col" class="px-6 py-3">Nº</th>
                    <th scope="col" class="px-6 py-3">Nomes</th>
                    <th scope="col" class="px-6 py-3">E-mail</th>
                    <th scope="col" class="px-6 py-3">Roles</th>
                    <th scope="col" class="px-6 py-3">Ações</th>
                </tr>

                @php
                    $i = 1;
                @endphp
                
                @foreach ($users as $key => $user)
                
                    <tr style="height: 50px">
                        <td scope="col" class="px-6 py-3">{{ $i++ }}</td>
                        <td scope="col" class="px-6 py-3">{{ $user->name }}</td>
                        <td scope="col" class="px-6 py-3">{{ $user->email }}</td>
                        <td scope="col" class="px-6 py-3">
                            @if(!empty($user->getRoleNames()[0]))
                                <label>{{ $user->getRoleNames()[0] }}</label>
                            @else
                                <label>-</label>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('users.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                @can('user-list')
                                    <a href="/show/{{ $user->id }}"
                                        class="font-bold text-white py-3 px-4 rounded-md bg-blue-500 hover:bg-blue-600">Ver</a>
                                @endcan

                                @can('user-edit')
                                    <a href="/edit/{{ $user->id }}" class="font-bold text-white py-3 px-4 rounded-md bg-blue-500 hover:bg-blue-600">Editar</a>  
                                @endcan     

                                @if ($user['status'] == 1)
                                    @can('user-block')
                                        <a href="/users/block/{{ $user->id }}"
                                            class="font-bold text-white py-3 px-4 rounded-md bg-yellow-300 hover:bg-yellow-400">BLOQUEAR</a>
                                            
                                    @endcan
                                    
                                @else
                                    @can('user-unlock')
                                    <a href="/users/unlock/{{ $user->id }}"
                                        class="font-bold text-white py-3 px-4 rounded-md bg-yellow-300 hover:bg-yellow-400">DESBLOQUEAR</a>
                                        
                                    @endcan
                                @endif

                                @can('user-delete')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir o Usuário?')"
                                        class="font-bold text-white py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">EXCLUIR</button>
                                @endcan
                                
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
