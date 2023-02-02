@extends('layouts.app')

@section('title', 'Register')

@section('content')


    <div class="block mx-auto mt-12 mb-4 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">

        <h1 class="text-3xl text-center font-bold">Criar Produto</h1>

        <form class="mt-4" method="POST" action="">
            @csrf
            <input type="text"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Nome do produto" id="name" name="name" value="{{ old('name') }}"> 

            @error('name')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">{{ $message }}
                </p>
            @enderror

            <input type="text"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Descrição" id="description" name="description" value="{{ old('description') }}">

            @error('description')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">{{ $message }}
                </p>
            @enderror
            {{-- onkeypress="return event.charCode > 48 && event.charCode <= 57" --}}
            <input type="number" min="1"
                class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
                placeholder="Quantidade" id="quantity" name="quantity" value="{{ old('quantity') }}">

            @error('quantity')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">{{ $message }}
                </p>
            @enderror
    </div>
    <div style="display: flex; justify-content: center;">
                <a href="{{ route('products.index') }}"
                    class="font-bold text-white
                    py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600" style=" margin-right: 10px;">Voltar</a>
    
                <button type="submit"
                class="font-bold text-white
                py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600">Salvar</button>
            </div>
        </form>
@endsection
