@extends('layouts.app')

@section('title', 'Editar Role')

@section('content')


    <div class="block mx-auto my-12 p-8 bg-white border border-gray-200 
                rounded-lg shadow-lg" style="width: 50%">

        <h1 class="text-3xl text-center font-bold">Editar Role</h1>

        <form class="mt-4" method="POST" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PUT')
            <input type="text"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
                text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Novo Nome da Role" id="name" name="name" value="{{ old('description') ?? $role['name'] }}">

            @error('name')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">{{ $message }}</p>
            @enderror

            <p class="font-bold my-2 text-center">Permissões:</p>
            <div class="flex justify-center">
                <div class="mr-10">
                    <p class="font-medium">Usuários</p>
                    @foreach ($permissionUser as $item)
                        
                    <div>
                        <label>{{ Form::checkbox('permission[]', $item->id, in_array($item->id, $rolePermissions) 
                        ? true : false, array('class' => 'name')) }}
                        {{ $item->showname }}</label>
                    </div>
                    
                    @endforeach
                    
                </div>

                <div class="mr-10">
                    <p class="font-medium">Produtos</p>
                    @foreach ($permissionProduct as $item)
                        
                    <div>
                        <label>{{ Form::checkbox('permission[]', $item->id, in_array($item->id, $rolePermissions) 
                        ? true : false, array('class' => 'name')) }}
                        {{ $item->showname }}</label>
                    </div>
                    
                    @endforeach
                    
                </div>

                <div class="mr-10">
                    <p class="font-medium">Roles</p>
                    @foreach ($permissionRole as $item)
                        
                    <div>
                        <label>{{ Form::checkbox('permission[]', $item->id, in_array($item->id, $rolePermissions) 
                        ? true : false, array('class' => 'name')) }}
                        {{ $item->showname }}</label>
                    </div>
                    
                    @endforeach
                    
                </div>
            </div>

            @error('permission')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">{{ $message }}</p>
            @enderror
            
        </div>


            <div class="mt-5" style="display: flex; justify-content: center;">
                <a href="{{ route('roles.index') }}"
                    class="font-bold text-white
                    py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600"
                    style=" margin-right: 10px;">Voltar</a>

                <button type="submit"
                    class="font-bold text-white
                py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600">Salvar</button>
            </div>


        </form>


    </div>

@endsection
