<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->limit(3)->get();
        return view('index', compact('products'));
    }

    public function dashboard()
    {
        return view('admin.index');
    }

}
