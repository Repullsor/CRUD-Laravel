@extends('layouts.app')

@section('title', 'Edit - Product')

@section('content')


    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">

        <h1 class="text-3xl text-center font-bold">Editar Produto</h1>

        <form class="mt-4" method="post" action="{{ route('product.update', $product->id) }}">
            @csrf
            @method('PUT')
            <input type="text"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
                text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Novo Nome do Produto" id="name" name="name" value="{{ old('name') ?? $product['name'] }}">

            @error('name')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">{{ $message }}
                </p>
            @enderror

            <input type="text"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
                text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Nova descrição" id="description" name="description" value="{{ old('description') ?? $product['description'] }}">

            @error('description')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2"> {{ $message }}
                </p>
            @enderror

            <input type="number" min="1"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
                text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Nova Quantidade" id="quantity" name="quantity" value="{{ old('quantity') ?? $product['quantity'] }}">

            @error('quantity')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2"> {{ $message }}
                </p>
            @enderror

                <div class="" style="display: flex; justify-content: center;">
                    <a href="{{ route('products.index') }}"
                        class="font-bold text-white
                        py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600" style=" margin-right: 10px;">Voltar</a>
        
                    <button type="submit"
                    class="font-bold text-white
                    py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600">Salvar</button>
                </div>
                

        </form>

        


    </div>

@endsection
