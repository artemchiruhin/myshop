@extends('layouts.app')

@section('title', 'Регистрация')
@section('description', 'Регистрация в интернет-магазине MyShop. Зарегистрирй')

@section('content')
    <div class="row">
        <div class="col-md-3 col-12 mx-auto register-form">
            <h2 class="title text-purple text-center mb-5"><span class="title-bar">Регистрация</span></h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                @error('formError')
                <div class="danger alert-danger">
                    <i class="fas fa-times-circle"></i>
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label for="login" class="form-label">Введите логин</label>
                    <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" name="login" value="{{ old('login') }}" placeholder="Например, vcursedel">
                    @error('login')
                    <span class="invalid-feedback fadeInLeft" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="full-name" class="form-label">Введите ФИО</label>
                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full-name" name="full_name" value="{{ old('full_name') }}" placeholder="Например, Чирухин Артем Андреевич">
                    @error('full_name')
                    <span class="invalid-feedback fadeInLeft" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Введите email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" name="email" placeholder="Например, admin@admin.com">
                    @error('email')
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
                <div class="mb-3">
                    <label for="password2" class="form-label">Повторите пароль</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password2" name="password_confirmation">
                    @error('password_confirmation')
                    <span class="invalid-feedback fadeInLeft" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <label class="form-check-label" for="check">Даю согласие на обработку персональных данных</label>
                    <input type="checkbox" name="checkbox" class="form-check-input @error('checkbox') is-invalid @enderror" id="check">
                    @error('checkbox')
                    <span class="invalid-feedback fadeInLeft" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-purple w-100">Зарегистрироваться</button>
            </form>
        </div>
    </div>
@endsection
