@extends('admin.index')
@section('title', 'Все категории')
@section('admin-content')
    <div class="col-lg-9 col-12">
        <h2 class="text-purple mb-3">Заказы</h2>
        @if (session()->has('orderStatusChanged'))
            <div class="alert alert-primary mt-3">
                <i class="far fa-check-circle"></i>
                {{ session('orderStatusChanged') }}
            </div>
        @endif
        <div class="categories-table-container">
            @if(count($orders) > 0)
            <table class="table categories-table mt-4">
                <thead>
                <tr class="text-green">
                    <th>ID</th>
                    <th>Покупатель</th>
                    <th>Товары</th>
                    <th>Стоимость</th>
                    <th>Статус</th>
                    <th>Сообщение</th>
                    <th class="text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th>{{ $order->id }}</th>
                        <td>{{ $order->user->full_name }}</td>
                        <td>
                            @foreach($order->products as $product)
                                <a href="{{ route('products.show', $product) }}" class="text-purple text-decoration-none">{{ $product->title }}</a>,
                            @endforeach
                        </td>
                        <td>{{ array_sum($order->products()->pluck('price')->toArray()) }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->message }}</td>
                        <td class="text-center">
                            @if($order->status === 'Новый')
                                <a href="{{ route('admin.orders.change-status-order', $order) }}" class="btn btn-purple">Изменить статус</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <h4 class="text-center">Заказов пока нет.</h4>
            @endif
        </div>
    </div>
@endsection
