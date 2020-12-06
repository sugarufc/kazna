<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create()
    {
        //return redirect()->route('login');
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'Реистрация прошла успешно');
        Auth::login($user);
        return redirect()->route('admin.index');
    }

    public function login(){
        return view('user.login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'email|required',
        ]);

        if (Auth::attempt([
            'password' => $request->password,
            'email' => $request->email
        ])){
            session()->flash('success', 'Вы вошли в систему как Администратор');
            return redirect()->route('admin.index');
        }else{
            return redirect()->back()->with('errors', 'Неверный пароль');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
