<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){

       if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        if(Auth::user()->email_verified_at==null){
            Auth::logout();
            return redirect('login');
        }
      
            return redirect("/cabinet");
        }
        return back()->withErrors(['email' => 'Неправильный email или пароль']);
    }
    public function logout()
{
   Auth::logout(); 
   return redirect('login');
}
}
