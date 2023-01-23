@extends('layouts.app')

@section('title', 'Screen')

@section('content')

    <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; height: 95%">
        <a href="{{ route('users.index') }}"
            class="font-semibold
            border-2 border-white py-2 px-4 bg-indigo-500 text-white rounded-md hover:bg-white 
            hover:text-indigo-700" style="margin-bottom: 1%">Usuários</a>

        <a href="{{ route('products.index') }}"
            class="font-semibold
            border-2 border-white py-2 px-4 bg-indigo-500 text-white rounded-md hover:bg-white 
            hover:text-indigo-700">Produtos</a>
    </div>

@endsection