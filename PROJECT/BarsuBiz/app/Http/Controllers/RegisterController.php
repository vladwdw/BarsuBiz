<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    public function register(Request $request){
        $user = new User();
        $user->name = $request->input("username");
        $user->email = $request->input("email");
        $user->password = $request->input("password");
        $user->save();

    }
}
