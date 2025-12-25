@extends('layout.app')

@section('content')
    <div>
        <div>
            <p>Вход</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
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
                <label for="login">Логик</label>
                <input type="text" name="login" required>
            </div>
            <div>
                <label for="password">Пароль</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Войти</button>
        </form>
        <a href="{{ route('home') }}">На главную.</a>
    </div>
@endsection
