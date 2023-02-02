<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    function __construct() {

        $this->middleware('permission:product-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['delete']]);

    }

    public function index() {

        $products = Product::all()->toArray();

        return view('products.products', compact('products'));

    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric|min:1',
        ], [
            'required' => ':attribute é obrigatório!',
            'min' => "O valor não pode ser menor que 1",
            'numeric' => 'O campo precisa ser um número'
        ], [
            'name' => "Nome",
            'description' =>  "Descrição",
            'quantity' => "Quantidade"
        ]);

        $product = Product::create(request(['name', 'description', 'quantity']));

        return redirect()->to('/products')->with('success', 'Produto criado com sucesso!');
    }

    public function edit($id) {

        if (!$product = Product::find($id))
            return redirect()->route('products.index');

        return view('products.edit', compact('product'));

    }

    public function show($id) {

        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    public function update(Request $request, $id) {

        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|min:1',
        ], [
            'name' => 'Nome é obrigatório!',
            'description' => 'Descrição é obrigatório!',
            'quantity' => 'Quantidade é obrigatória!'
        ]);

        $product = Product::find($id);
        $data = $request->only('name', 'description', 'quantity');
    
        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Produto atualizado!');

        }

    public function destroy($id) {

            $product = Product::find($id);
            $product->delete();
        
        return redirect()->route('products.index')->with('error', 'Produto excluido!');

    }
}
