@extends('layouts.app')

@section('title', 'Show - Product')

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" style="text-align: center;">
            <tr scope="col" class="px-6 py-3">
                <th scope="col" class="px-6 py-3">Nº</th>
                <th scope="col" class="px-6 py-3">Nome</th>
                <th scope="col" class="px-6 py-3">Descrição</th>
                <th scope="col" class="px-6 py-3">Quantidade</th>
                <th scope="col" class="px-6 py-3">Ações</th>
            </tr>

                
            <tr style="height: 50px">
                <td scope="col" class="px-6 py-3">{{ $product['id'] }}</td>
                <td scope="col" class="px-6 py-3">{{ $product['name'] }}</td>
                <td scope="col" class="px-6 py-3">{{ $product['description'] }}</td>
                <td scope="col" class="px-6 py-3">{{ $product['quantity'] }}</td>
                <td>
                    <form action="{{ route('product.delete', $product['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    @can('product-edit')
                        <a href="/products/edit/{{ $product['id'] }}" class="font-bold text-white
                    py-3 px-4 rounded-md bg-blue-500 hover:bg-blue-600">Editar</a>
                    @endcan
                    
                    @can('product-delete')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir o Produto?')"
                        class="font-bold text-white py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">EXCLUIR</button>
                    @endcan
                </form>
                </td>
            </tr>
        </thead>
    </table>
    
</div>
<div style="margin: 20px auto; width: 80px; text-align: center">
    <a href="{{ route('products.index') }}" class="font-bold text-white
    py-3 px-4 rounded-md bg-indigo-500 hover:bg-blue-600">Voltar</a>  
</div>


@endsection