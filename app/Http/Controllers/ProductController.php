<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {

        $products = Product::all()->toArray();

        return view('products', compact('products'));

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
}
