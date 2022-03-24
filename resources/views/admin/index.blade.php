@extends('layouts.app')
@section('title', 'Панель администратора')
@section('content')
    <section>
        <div class="container">
            <div class="row admin-dashboard">
                <div class="col-lg-3 col-12 admin-sidebar-container">
                    <ul class="admin-sidebar">
                        <li>
                            <a href="{{ route('admin.index') }}" class="nav-link @if(route('admin.index') === url()->current()) active @endif">
                                Главная
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories.index') }}" class="nav-link @if(route('admin.categories.index') === url()->current()) active @endif">
                                Категории
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products.index') }}" class="nav-link @if(route('admin.products.index') === url()->current()) active @endif">
                                Товары
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.orders.index') }}" class="nav-link @if(route('admin.orders.index') === url()->current()) active @endif">
                                Заказы
                            </a>
                        </li>
                    </ul>
                </div>
                @section('admin-content')
                <div class="col-lg-9 col-12">
                    <h2 class="title text-purple">Панель администратора</h2>
                    <p>Добро пожаловать, {{ auth()->user()->full_name }}!</p>
                    <p>Это панель администратора, здесь Вы можете управлять данными.</p>
                    <em class="text-purple">Сегодня {{ date('d.m.Y') }}</em>
                </div>
                @endsection
                @yield('admin-content')
            </div>
        </div>
    </section>
@endsection
