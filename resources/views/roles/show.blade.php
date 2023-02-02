@extends('layouts.app')

@section('title', 'Show - Roles')

@section('content')

    <h1 class="text-center font-bold text-xl my-5">Role e Pemissões</h1>

    <div
        class="relative overflow-x-auto shadow-md sm:rounded-lg  text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <div class="text-base text-center my-5">
            <p class="font-bold uppercase">Role:</p>
            <p class="uppercase my-1">{{ $role->name }}</p>
            <p class="font-bold uppercase my-3">Permissões:</p>
            <div class="flex justify-center">
                <div class="mr-10">
                    <p class="font-medium">Usuários</p>
                    @if (!empty($rolePermissionsUser))

                        @foreach ($rolePermissionsUser as $item)
                            <ul>{{ $item->showname }}</ul>
                        @endforeach

                    @endif

                </div>
                <div class="mr-10">
                    <p class="font-medium">Produtos</p>
                    @if (!empty($rolePermissionsProduct))

                        @foreach ($rolePermissionsProduct as $item)
                            <ul>{{ $item->showname }}</ul>
                        @endforeach

                    @endif

                </div>
                <div class="mr-10">
                    <p class="font-medium">Roles</p>
                    @if (!empty($rolePermissionsRole))

                        @foreach ($rolePermissionsRole as $item)
                            <ul>{{ $item->showname }}</ul>
                        @endforeach

                    @endif

                </div>

            </div>

        </div>

    </div>

    <div style="margin: 20px auto; width: 80px; text-align: center">
        <a href="{{ route('roles.index') }}" class="font-bold text-white
        py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600">Voltar</a>  
</div>

@endsection
