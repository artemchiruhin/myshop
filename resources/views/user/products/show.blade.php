@extends('layouts.app')
@section('title', 'Продукт')
@section('description', "$product->meta_description")
@section('content')
    <section>
        <div class="container">
            <div class="product-block mt-3">
                <h2 class="title text-purple">{{ $product->title }}</h2>
                <div class="card mb-3 border-0">
                    <div class="row g-0">
                        <div class="col-md-4 col-sm-12">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-start" alt="{{ $product->title }}">
                        </div>
                        <div class="col-md-8 col-sm-12 card-body product-block__body">
                            <p class="card-text">{!! $product->description !!}</p>
                            <p class="card-text">Категория: {{ $product->category->title }}</p>
                            <p class="card-text">Цена: {{ $product->price }}</p>
                            <form action="{{ route('products.addToCart', $product) }}" method="POST">
                                @csrf
                                <button class="btn btn-yellow" type="submit"><i class="fa-solid fa-cart-shopping"></i> В корзину</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-comments">
                <h3 class="text-purple">Комментарии</h3>
                @foreach($product->comments as $comment)
                <div class="product-comment mt-3">
                    <p><strong>{{ $comment->user->full_name }}</strong></p>
                    <p>{{ $comment->comment }}</p>
                </div>
                @endforeach
            </div>
            <form action="{{ route('products.makeComment', $product) }}" method="POST" class="comment-form mt-3">
                <h4 class="title text-purple">Оставьте комментарий</h4>
                @csrf
                <div class="mb-3">
                    <label for="comment">Ваш комментарий</label>
                    <input type="text" id="comment" name="comment" value="{{ old('comment') }}" class="form-control @error('comment') is-invalid @enderror">
                    @error('comment')
                    <span class="invalid-feedback fadeInLeft">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-purple">Отправить</button>
            </form>
        </div>
    </section>
@endsection
