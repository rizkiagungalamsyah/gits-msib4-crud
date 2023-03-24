<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $carts = Cart::with('product')->get();
        $products = Product::with('category')->get();

        return view('cart.index', compact('categories', 'products', 'carts'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'qty' => 'required|numeric',
        ]);

        $data = $request->all();

        $cart = Cart::where('product_id', $request->product_id)->first();
        $cart ? $data['qty'] += $cart->qty : $data['qty'];

        $product = Product::findOrFail($request->product_id);
        if ($product->stock < $data['qty']) {
            return redirect()->back()->with('error', 'Out of stock product');
        }

        Cart::updateOrCreate([
            'product_id' => $request->product_id,
        ], $data);

        return redirect()->back()->with('success', 'Product Added to Cart!');
    }

    public function editCart(Cart $cart)
    {
        $categories = Category::all();
        $products = Product::all();
        return view('cart.edit', compact('categories', 'products', 'cart'));
    }

    public function updateCart(Request $request, Cart $cart)
    {
        $request->validate([
            'qty' => 'required|numeric',
        ]);

        $data = $request->all();

        $product = $cart->product;
        if ($product->stock < $data['qty']) {
            return redirect()->back()->with('error', 'Out of stock product');
        }

        $cart->update($data);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    public function checkout(Request $request)
    {
        $total = $request->input('total');
        $cash = $request->input('cash');
        $change = $cash - $total;

        if ($change < 0) {
            return redirect()->back()->with('error', 'Invalid cash amount.');
        }

        Cart::truncate();

        return redirect()->route('cart.index')->with('success', 'Transaction successful. Change: Rp. ' . number_format($change));
    }

    public function removeFromCart(Cart $cart)
    {
        $cart->delete();

        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}
