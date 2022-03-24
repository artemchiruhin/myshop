<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\ProductFormUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedFields = $request->validated();
        $image = $request->file('image');
        $path = $image->store('products');
        $validatedFields['image'] = $path;
        Product::create($validatedFields);
        return redirect(route('admin.products.index'))->with(['productCreated' => 'Товар успешно добавлен.']);
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Product $product, ProductFormUpdateRequest $request)
    {
        $validatedFields = $request->validated();
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('products');
            $validatedFields['image'] = $path;
        }
        $product->update($validatedFields);
        return redirect(route('admin.products.index'))->with(['productUpdated' => 'Товар был изменен.']);
    }

    public function destroy(Product $product)
    {
        if($product->delete()) {
            Storage::delete($product->image);
            return redirect(route('admin.products.index'))->with('productDeleted', 'Товар был удален.');
        }
    }
}
