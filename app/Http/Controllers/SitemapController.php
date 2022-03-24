<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $products = Product::all()->sortBy('created_at');
        return response()
            ->view('sitemap', compact('products'))
            ->header('Content-Type', 'text/xml');
    }
}
