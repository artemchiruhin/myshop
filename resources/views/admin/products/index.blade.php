@extends('admin.index')
@section('title', 'Все товары')
@section('admin-content')
    <div class="col-lg-9 col-12">
        <h2 class="text-purple mb-3">Товары</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Добавить</a>
        @if (session()->has('productCreated'))
            <div class="alert alert-success mt-3">
                <i class="far fa-check-circle"></i>
                {{ session('productCreated') }}
            </div>
        @endif
        @if (session()->has('productUpdated'))
            <div class="alert alert-info mt-3">
                <i class="fas fa-info-circle"></i>
                {{ session()->get('productUpdated') }}
            </div>
        @endif
        @if (session()->has('productDeleted'))
            <div class="alert alert-danger mt-3">
                <i class="fas fa-times-circle"></i>
                {{ session()->get('productDeleted') }}
            </div>
        @endif
        @if(count($products) > 0)
        <div class="mt-5">
            <img src="{{ asset('storage/products/blank.png') }}" alt="">

            @foreach($products as $product)
            <div class="product-block mt-5">
                <div class="card mb-3 border-0">
                    <div class="row g-0">
                        <div class="col-md-4 col-sm-12">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-start" alt="{{ $product->title }}">
                        </div>
                        <div class="col-md-8 col-sm-12 card-body product-block__body">
                            <p class="card-text">{{ $product->title }}</p>
                            <p class="card-text">{!! $product->description !!}</p>
                            <p class="card-text">Категория: {{ $product->category->title }}</p>
                            <p class="card-text">Цена: {{ $product->price }} руб.</p>
                            <div class="card-buttons d-flex">
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary mx-1">Изменить</a>
                                <form action="{{ route('admin.products.delete', $product) }}" method="POST" class="mx-1">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <h4 class="text-center">Товаров пока нет.</h4>
        @endif
    </div>
@endsection
