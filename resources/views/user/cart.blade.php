@extends('layouts.app')
@section('title', 'Корзина')
@section('description', 'Корзина. Локальное хранение товаров пользователей интернет-магазина MyShop. Здесь хранятся все добавленные в корзину товары')
@section('content')
    <section>
        <div class="container">
            <h2 class="title text-purple mt-5">Корзина</h2>
            @if(count($products) > 0)
            <div class="cart-products">
                @foreach($products as $product)
                <div class="product-block mt-5">
                    <div class="card mb-3 border-0">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('/storage/' . $product->image) }}" class="img-fluid rounded-start" alt="{{ $product->title }}">
                            </div>
                            <div class="col-md-8 card-body product-block__body">
                                <h3 class="card-title text-purple">{{ $product->title }}</h3>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">Категория: {{ $product->category->title }}</p>
                                <p class="card-text">Цена: {{ $product->price }} руб.</p>
                                <form action="{{ route('products.removeFromCart', $product) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-yellow" type="submit">Убрать из корзины</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <form action="{{ route('cart.makeOrder') }}" method="POST" class="my-5">
                <p class="text-purple">Стоимость: {{ array_sum(array_column($products, 'price')) }} руб.</p>
                @csrf
                <button class="btn btn-purple" type="submit">Оформить заказ</button>
            </form>
            @else
            <h4 class="text-center">Коризна пуста.</h4>
            @endif
        </div>
    </section>
@endsection
