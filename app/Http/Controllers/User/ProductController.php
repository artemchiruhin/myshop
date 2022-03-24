<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('user.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('user.products.show', compact('product'));
    }

    public function addProductToCart(Product $product)
    {
        session()->push('cart', $product->id);
        return redirect()->back();
    }

    public function removeProductFromCart(Product $product)
    {
        $products = session()->pull('cart', []);
        if(($key = array_search($product->id, $products)) !== false) {
            unset($products[$key]);
        }
        session()->put('cart', $products);
        return redirect(route('cart.index'));
    }
}
