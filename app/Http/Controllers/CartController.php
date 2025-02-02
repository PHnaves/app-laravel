<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Webkleur\Cart\Facades\Cart;
use Webkleur\Cart\Facades\CartFacade;

class CartController extends Controller
{
    public function index() {
        $products = CartFacade::getContent();
        return view('products.cart', compact('products'));
    }

    public function addToCart(Request $request) {
        CartFacade::add([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'price' => (float) $request->input('price'),
            'quantity' => (int) $request->input('quantity'),
            'attributes' => array(
                'image' => $request->input('image'),
            ) 
        ]);
        

        return redirect()->route('products.cart');
    }

    public function remove(Request $request) {
        CartFacade::remove($request->input('id'));
        return redirect()->route('products.cart');
    }

    public function update(Request $request) {
        CartFacade::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ]
        ]);
        return redirect()->route('products.cart');
    }

    public function clear() {
        CartFacade::clear();
        return redirect()->route('products.cart')->with('aviso', 'carrinho esvaziado com sucesso');
    }
}
