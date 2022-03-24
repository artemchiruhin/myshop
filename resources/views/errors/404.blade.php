@extends('layouts.app')

@section('title', 'Страница не найдена')

@section('content')
    <div class="container">
        <div class="page-not-found">
            <h1 class="title text-purple">
                <span class="title-bar"><i class="fa-solid fa-circle-exclamation"></i> Упс... Страница не найдена!</span>
            </h1>
            <a href="{{ route('index') }}" class="btn btn-purple">На главную</a>
        </div>
    </div>
@endsection
