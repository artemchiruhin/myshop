@extends('layouts.app')
@section('keywords', 'Одежда, новая коллекция, весення распродажа, крутки, пальто, кроссовки')
@section('description', 'Интернет-магазин MyShop. Магазин одежды с низкими ценами. Быстрая и дешевая доставка до вашей двери, гарантия на все купленные товары. Частые акции широкий ассортимент товаров и квалифицированные менеджеры.')
@section('title', 'MySHOP')
@section('content')
    <div class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col hero-block-left">
                    <h1 class="title title-main">
                        <span class="title-bar">MySHOP</span>
                    </h1>
                    <p class="hero-description">Лучший интернет-магазин одежды с низкими ценами</p>
                    <button class="btn btn-yellow hero-btn" type="button"><i class="fa-solid fa-arrow-down"></i> Посмотреть товары</button>
                </div>
                <div class="col-6 hero-block-right">
                    <img src="{{ asset('img/hero-img.png') }}" alt="" class="hero-img">
                </div>
            </div>
        </div>
    </div>
    <section class="products-section">
        <div class="container">
            <h1 class="title text-center text-purple">
                <span class="title-bar">Товары</span>
            </h1>
            <div class="products row flex-wrap justify-content-center">
                @forelse($products as $product)
                <div class="card col-xl-3 col-md-4 col-12 m-3 product-card">
                    <img src="{{ asset('/storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                    <div class="card-body product-block__body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{!! \Illuminate\Support\Str::words($product->description, 10) !!}</p>
                        <p class="card-text">Категория: {{ $product->category->title }}</p>
                        <p class="product-price">Цена: {{ $product->price }} руб.</p>
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
                <div class="text-center py-5">
                    <a href="{{ route('products.index') }}" class="text-purple text-decoration-none">Все товары <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="feedback">
        <div class="container">
            <div class="row">
                <div class="col-4 m-auto">
                    <h3 class="title text-purple">
                        <span class="text-bar">Свяжитесь с нами</span>
                    </h3>
                    <form action="" class="feedback-form">
                        <div class="mb-3">
                            <label for="name">Ваше имя</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Ваш номер</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="message">Ваше сообщение</label>
                            <textarea name="message" id="message" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-purple">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col footer-main">
                    <h2 class="title text-purple">MySHOP</h2>
                    <button class="btn btn-purple-outline footer-btn"><i class="fa-solid fa-arrow-up"></i> Посмотреть товары</button>
                </div>
                <div class="col contacts">
                    <h3 class="title text-purple">Контакты</h3>
                    <ul class="contacts-list">
                        <li>
                            <a href="#" class="text-purple"><i class="fa-brands fa-instagram"></i> Instagram</a>
                        </li>
                        <li>
                            <a href="#" class="text-purple"><i class="fa-brands fa-vk"></i> ВКонтакте</a>
                        </li>
                        <li>
                            <a href="#" class="text-purple"><i class="fa-brands fa-telegram"></i> Telegram</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
@endsection
