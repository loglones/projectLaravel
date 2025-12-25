@extends('layout.app')

@section('content')
    <div>
        <div>
            <h1>Магазин товаров</h1>
            <a href="{{ route('products.create') }}">Добавить товар</a>
        </div>
        <table>
            <thead>
            <tr>
                <td>ID</td>
                <td>Название</td>
                <td>Категория</td>
                <td>Количество</td>
                <td>Цена</td>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category }}</td>
                    <td style="@if($product->count <=5) background-color:#fff3cd @endif">{{ $product->count }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <form method="POST" action="{{ route("products.destroy", $product) }}">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Удалить?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
