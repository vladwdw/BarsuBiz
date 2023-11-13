<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Правила валидации
        $rules = [
            'username' => 'required|string|max:12',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ];
    
        // Сообщения об ошибках
        $messages = [
            'username.max'=> 'Имя пользователя не может быть больше 12 символов',
            'username.required' => 'Поле Имя пользователя обязательно для заполнения',
            'email.required' => 'Поле email обязательно для заполнения',
            'email.email' => 'Введите действительный email адрес',
            'email.unique' => 'Пользователь с таким email уже существует',
            'password.required' => 'Поле пароль обязательно для заполнения',
            'password.min' => 'Минимальная длина пароля должна быть 6 символов',
        ];
    
        // Выполняем валидацию
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Если валидация не прошла, возвращаем пользователя с ошибками
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            $user = new User();
            $user->name = $request->input("username");
            $user->email = $request->input("email");
            $user->password = bcrypt($request->input("password"));
            event(new Registered($user));
            $user->save();
            
            return redirect("/login");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
