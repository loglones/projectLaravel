<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:60',
            'login' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'role' => 'user'
        ]);
        $user = User::create([
            'name' => $request->name,
            'login' => $request->login,
            'password' => bcrypt($request->password),
            'role' => 'user'
        ]);
        auth()->login($user);
        return redirect()->route('home')->with('success','Регистрация прошла успешно');
    }
}
