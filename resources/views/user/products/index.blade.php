@extends('layouts.app')
@section('title', 'Все продукты')
@section('description', 'Магазин одежды с низкими ценами. Быстрая и дешевая доставка до вашей двери, гарантия на все купленные товары. Частые акции широкий ассортимент товаров и квалифицированные менеджеры.')
@section('content')
    <section>
        <div class="container">
            <h2 class="title text-purple mt-5">Все товары</h2>
            <div class="products row flex-wrap justify-content-center">
                @forelse($products as $product)
                <div class="card col-xl-3 col-lg-4 col-12 m-3 product-card">
                    <img src="{{ asset('/storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                    <div class="card-body product-block__body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{!! \Illuminate\Support\Str::words($product->description, 10) !!}</p>
                        <p class="card-text">Категория: {{ $product->category->title }}</p>
                        <p class="product-price">Цена: {{ $product->price }}</p>
                        <div class="product-buttons">
                            <form action="{{ route('products.addToCart', $product) }}" method="POST">
                                @csrf
                                <button class="btn btn-yellow"><i class="fa-solid fa-cart-shopping"></i> В корзину</button>
                            </form>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-yellow-outline">Подробнее</a>
                        </div>
                    </div>
                </div>
                @empty
                    <h4 class="text-center">Товаров пока нет.</h4>
                @endforelse
            </div>
        </div>
    </section>
@endsection
