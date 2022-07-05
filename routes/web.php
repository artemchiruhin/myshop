<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\User\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::view('/about-us', 'user.about-us')->name('aboutUs');

Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::name('products.')->group(function() {
    Route::get('/products', [Controllers\User\ProductController::class, 'index'])->name('index');
    Route::get('/products/{product}', [Controllers\User\ProductController::class, 'show'])->name('show');
    Route::post('/products/{product}/add-to-cart', [Controllers\User\ProductController::class, 'addProductToCart'])->middleware('auth')->name('addToCart');
    Route::post('/products/{product}/remove-from-cart', [Controllers\User\ProductController::class, 'removeProductFromCart'])->middleware('auth')->name('removeFromCart');
    Route::post('/products/{product}/make-comment', [CommentController::class, 'store'])->middleware('auth')->name('makeComment');
});

Route::name('cart.')->middleware('auth')->group(function() {
    Route::get('/cart', [CartController::class, 'index'])->name('index');
    Route::post('/cart/make-order', [CartController::class, 'makeOrder'])->name('makeOrder');
});

Route::name('admin.')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin', [IndexController::class, 'dashboard'])->name('index');

    Route::name('categories.')->group(function() {
        Route::get('/admin/categories', [CategoryController::class, 'index'])->name('index');

        Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/admin/categories/create', [CategoryController::class, 'store'])->name('store');

        Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/admin/categories/{category}/edit', [CategoryController::class, 'update'])->name('update');

        Route::delete('/admin/categories/{category}/delete', [CategoryController::class, 'destroy'])->name('delete');
    });

    Route::name('products.')->group(function() {
        Route::get('/admin/products', [Controllers\Admin\ProductController::class, 'index'])->name('index');

        Route::get('/admin/products/create', [Controllers\Admin\ProductController::class, 'create'])->name('create');
        Route::post('/admin/products/create', [Controllers\Admin\ProductController::class, 'store'])->name('store');

        Route::get('/admin/products/{product}/edit', [Controllers\Admin\ProductController::class, 'edit'])->name('edit');
        Route::put('/admin/products/{product}/edit', [Controllers\Admin\ProductController::class, 'update'])->name('update');

        Route::delete('/admin/products/{product}/delete', [Controllers\Admin\ProductController::class, 'destroy'])->name('delete');
    });

    Route::name('orders.')->group(function() {
        Route::get('/admin/orders', [OrderController::class, 'index'])->name('index');

        Route::get('/admin/orders/{order}/change-status', [OrderController::class, 'edit'])->name('change-status-order');
        Route::post('/admin/orders/{order}/change-status', [OrderController::class, 'update']);
    });
});

Route::get('/sitemap.xml', [SitemapController::class, 'index']);
