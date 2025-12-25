<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'login' => $request->login,
            'password' => $request->password
        ];
        if(auth()->attempt($credentials)){
            return redirect()->route('home')->with('success', 'Вход выполнен успешно');
        }
        return back()->withErrors([
            'login' => 'Неверный логин или пароль!'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
