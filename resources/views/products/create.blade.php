@extends('layout.app')

@section('content')
    <div>
        <div>
            <h1>Добавление товара</h1>
        </div>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            @if($errors->any())
                <div>
                    <ul>
                        @foreach($errors->any() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div>
                    <label for="name">Название товара</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label for="category">Категория товара(вручную)</label>
                    <input type="text" name="category" required>
                </div>
                <div>
                    <label for="count">Количество товара</label>
                    <input type="number" step="1" min="0" name="count" required>
                </div>
                <div>
                    <label for="price">Цена товара</label>
                    <input type="number" step="1" min="1" name="price" required>
                </div>
            <button type="submit">Добавить</button>
        </form>
        <div>
            <a href="{{ route('products.index') }}">Просмотреть товары</a>
        </div>
    </div>
@endsection
