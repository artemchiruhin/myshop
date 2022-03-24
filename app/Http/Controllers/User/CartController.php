<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $products = [];
        foreach(session('cart') ?? [] as $item) {
            $products[] = Product::find($item);
        }
        return view('user.cart', compact('products'));
    }

    public function makeOrder()
    {
        $order = Order::create([
            'user_id' => auth()->id(),
        ]);
        $order->products()->attach(session('cart'));
        session()->forget('cart');
        return redirect(route('cart.index'));
    }
}
