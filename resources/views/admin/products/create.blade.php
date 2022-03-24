@extends('layouts.app')

@section('title', 'Добавить товар')

@section('content')
    <h2 class="text-center text-purple mt-5">Добавить товар</h2>
    <div class="row mt-5">
        <div class="col-sm-8 col-6 mx-auto">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                @error('formError')
                <div class="danger alert-danger p-2 mb-2 fadeInLeft">
                    <i class="fas fa-times-circle"></i>
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label for="title" class="form-label">Введите название</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" id="title">
                    @error('title')
                    <span class="invalid-feedback fadeInLeft" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Введите описание</label>
                    <input type="text" name="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror" id="description">
                    @error('description')
                    <span class="invalid-feedback fadeInLeft" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Введите цену</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" id="price">
                    @error('price')
                    <span class="invalid-feedback fadeInLeft" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Выберите категорию</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == old('category_id')) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="invalid-feedback fadeInLeft" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Выберите изображение</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                    @error('image')
                    <span class="invalid-feedback fadeInLeft" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Создать</button>
            </form>
            <a href="{{ route('admin.products.index') }}" class="btn btn-purple-outline mt-3"><i class="fas fa-arrow-left"></i> Назад</a>
        </div>
    </div>
@endsection
