<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){

        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            // Аутентификация успешна, перенаправьте пользователя
            return redirect("/cabinet");
        }
        return back()->withErrors(['email' => 'Неправильный email или пароль']);
    }
    public function logout()
{
   Auth::logout(); 
   return redirect('/login');
}
}
