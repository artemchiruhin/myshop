@extends('layouts.app')

@section('title', 'Вход')
@section('description', 'Авторизация в интернет-магазине одежды MyShop. Введите свои данные и войдите в свой аккаунт. Нет аккаунта? Зарегистрируйтесь')

@section('content')
    <div class="row">
        <div class="col-md-3 col-12 mx-auto register-form">
            <h2 class="title text-purple text-center mb-5"><span class="title-bar">Авторизация</span></h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @error('incorrect_user')
                <div class="danger alert-danger p-2 mb-2 fadeInLeft">
                    <i class="fas fa-times-circle"></i>
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label for="login" class="form-label">Введите логин</label>
                    <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" value="{{ old('login') }}" name="login" placeholder="Например, vcursedel">
                    @error('login')
                    <span class="invalid-feedback fadeInLeft" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Введите пароль</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                    <span class="invalid-feedback fadeInLeft" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-purple w-100">Войти</button>
            </form>
        </div>
    </div>
@endsection
