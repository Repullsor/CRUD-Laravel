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
            'quantity' => 'required',
        ]);

        $product = Product::create(request(['name', 'description', 'quantity']));

        return redirect()->to('/products');
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

        $product = Product::find($id);
        $data = $request->only('name', 'description', 'quantity');
    
        $product->update($data);
        return redirect()->route('products.index');
    
        }

    public function destroy($id) {

            $product = Product::find($id);
            $product->delete();
        
        return back();

    }
}
