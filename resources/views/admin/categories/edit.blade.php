@extends('layouts.app')

@section('title', 'Изменить категорию №' . $category->id)

@section('content')
    <h2 class="text-center text-purple mt-5">Изменить категорию № {{ $category->id }}</h2>
    <div class="row mt-5">
        <div class="col-sm-8 col-6 mx-auto">
            <form method="POST" action="{{ route('admin.categories.update', $category) }}">
                @csrf
                @method('PUT')
                @error('formError')
                <div class="danger alert-danger p-2 mb-2 fadeInLeft">
                    <i class="fas fa-times-circle"></i>
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label for="title" class="form-label">Введите название</label>
                    <input type="text" name="title" value="{{ $category->title }}" class="form-control @error('title') is-invalid @enderror" id="title">
                    @error('title')
                    <span class="invalid-feedback fadeInLeft" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Изменить</button>
            </form>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-purple-outline mt-3"><i class="fas fa-arrow-left"></i> Назад</a>
        </div>
    </div>
@endsection
