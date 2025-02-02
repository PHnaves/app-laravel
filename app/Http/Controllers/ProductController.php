<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function details(string $id)
    {
        // Busca o produto pelo ID, se não encontrar, redireciona com uma mensagem
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->route('products')->with('message', 'Product not found');
        }
    
        return view('products.details', compact('product'));
    }

    public function categories($id){
        $category = Category::find($id);
        $products = Product::where('id_category', $id)->get();
        return view('products.categories', compact('products', 'category'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
