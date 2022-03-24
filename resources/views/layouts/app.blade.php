<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navigation">
        <div class="container-fluid main-menu">
            <ul class="menu">
                <li class="logo">
                    <a href="{{ route('index') }}">MySHOP</a>
                </li>
                <li class="menu-top-item">
                    <a href="{{ route('products.index') }}"><i class="fa-solid fa-shirt"></i> Товары</a>
                </li>
                @auth
                <li class="menu-top-item position-relative">
                    <a href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping"></i> Корзина</a>
                    @if(session()->has('cart') && count(session('cart')) > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-yellow">
                        {{ count(session('cart')) }}
                    </span>
                    @endif
                </li>
                @endauth
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <li class="admin-panel-item">
                        <a href="{{ route('admin.index') }}">Панель администратора</a>
                    </li>
                @endif
            </ul>
            @auth
            <div class="nav-buttons">
                <a class="user-link" href="#"><i class="far fa-user"></i> {{ auth()->user()->login }}</a>
                <a class="btn btn-yellow-outline" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Выход</a>
            </div>
            @endauth
            @guest
            <div class="nav-buttons">
                <a class="btn btn-yellow" href="{{ route('login') }}">Вход</a>
                <a class="btn btn-yellow-outline" href="{{ route('register') }}">Регистрация</a>
            </div>
            @endguest
            <button type="button" class="btn btn-yellow btn-hamburger">
                <span></span>
            </button>
        </div>
        <div class="menu-bottom">
            <ul class="menu">
                <li>
                    <a href="{{ route('products.index') }}"><i class="fa-solid fa-shirt"></i> Товары</a>
                </li>
                @auth
                <li class="position-relative">
                    <a href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping"></i> Корзина</a>
                    @if(session()->has('cart') && count(session('cart')) > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ count(session('cart')) }}
                    </span>
                    @endif
                </li>
                @endauth
            </ul>
            @auth
            <div class="nav-buttons-bottom">
                <a class="user-link" href="#"><i class="far fa-user"></i> {{ auth()->user()->login }}</a>
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('admin.index') }}" class="admin-panel-link">Панель администратора</a>
                @endif
                <a class="btn btn-yellow-outline" href="{{ route('logout') }}">Выход</a>
            </div>
            @endauth
            @guest
            <div class="nav-buttons-bottom">
                <a class="btn btn-yellow" href="{{ route('login') }}">Вход</a>
                <a class="btn btn-yellow-outline" href="{{ route('register') }}">Регистрация</a>
            </div>
            @endguest
        </div>
    </nav>
    @yield('content')
</body>
</html>
