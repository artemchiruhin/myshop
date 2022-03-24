@extends('admin.index')
@section('title', 'Все категории')
@section('admin-content')
    <div class="col-lg-9 col-12">
        <h2 class="text-purple mb-3">Категории</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Добавить</a>
        @if (session()->has('categoryCreated'))
            <div class="alert alert-success mt-3">
                <i class="far fa-check-circle"></i>
                {{ session('categoryCreated') }}
            </div>
        @endif
        @if (session()->has('categoryUpdated'))
            <div class="alert alert-info mt-3">
                <i class="fas fa-info-circle"></i>
                {{ session('categoryUpdated') }}
            </div>
        @endif
        @if (session()->has('categoryDeleted'))
            <div class="alert alert-danger mt-3">
                <i class="fas fa-times-circle"></i>
                {{ session('categoryDeleted') }}
            </div>
        @endif
        <div class="categories-table-container">
            @if(count($categories) > 0)
            <table class="table categories-table mt-4">
                <thead>
                    <tr class="text-green">
                        <th>ID</th>
                        <th>Название</th>
                        <th>ЧПУ</th>
                        <th class="text-center">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $index => $category)
                    <tr>
                        <th>{{ $index + 1}}</th>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->slug }}</td>
                        <td class="text-center d-flex justify-content-center">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary mx-1">Изменить</a>
                            <form action="{{ route('admin.categories.delete', $category) }}" method="POST" class="mx-1">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <h4 class="text-center">Категорий пока нет.</h4>
            @endif
        </div>
    </div>
@endsection
