@extends('layout.app')

@section('content')
    <div>
        <div>
            <p>Регистрация</p>
        </div>
        <form method="POST" action="{{ route('register') }}">
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
                <label for="name">ФИО</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label for="login">Логин</label>
                <input type="text" name="login" required>
            </div>
            <div>
                <label for="password">Пароль</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label for="password_confirmation">Подтвердите пароль</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <button type="submit">Зарегистрироваться</button>
        </form>
        <div>
            <a href="{{ route('home') }}">На главную.</a>
            <a href="{{ route('login') }}">Уже есть аккаунт? Войти.</a>
        </div>
    </div>
@endsection
