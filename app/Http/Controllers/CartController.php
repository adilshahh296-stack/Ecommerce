<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $cart = session()->get('cart', []);
        $total = 0;
        $items = [];

        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            if ($product) {
                $items[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $product->price * $quantity,
                ];
                $total += $product->price * $quantity;
            }
        }

        return view('cart.index', compact('items', 'total', 'cart'));
    }

    public function add(Product $product): RedirectResponse
    {
        $cart = session()->get('cart', []);
        $quantity = request('quantity', 1);

        if (isset($cart[$product->id])) {
            $cart[$product->id] += $quantity;
        } else {
            $cart[$product->id] = $quantity;
        }

        session()->put('cart', $cart);
        
        return back()->with('success', 'Product added to cart!');
    }

    public function remove(Product $product): RedirectResponse
    {
        $cart = session()->get('cart', []);
        unset($cart[$product->id]);
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

    public function update(Product $product): RedirectResponse
    {
        $cart = session()->get('cart', []);
        $quantity = request('quantity', 0);

        if ($quantity > 0) {
            $cart[$product->id] = $quantity;
        } else {
            unset($cart[$product->id]);
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Cart updated!');
    }
}
