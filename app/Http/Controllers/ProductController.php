<?php

namespace App\Http\Controllers;

use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = $this->marketService->getProducts();

        return view('system.products.index', compact('products'));

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function show(Product $product){

    }

    public function edit(Product $product){

    }

    public function update(Request $request, Product $product){

    }

    public function destroy(Product $product){

    }
}
