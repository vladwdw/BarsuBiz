<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Auth\Events\Registered;
use App\Mail\Auth\VerifyMail;
use App\Mail\VerifyEmail;
use App\Models\VerifyUser;
use Carbon\Carbon;

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
            $user->age=$request->input("age");
            $user->password = bcrypt($request->input("password"));
           
            $user->save();

            VerifyUser::create([
                'token'=>Str::random(60),
                'user_id'=>$user->id
            ]);
            Mail::to($user->email)->send(new VerifyEmail($user));
            
            return redirect("/login");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
    public function verifyEmail($token){
        $verifiedUser= VerifyUser::where('token',$token)->first();
        if(isset($verifiedUser)){
            $user=$verifiedUser->user;
            if(!$user->email_verified_at){
                $user->email_verified_at=Carbon::now();
                $user->save();
                return redirect('login')->with('success','Your email has been verified');
            }
            else{
                return redirect()->back()->with('info','Your email has already been verified');
            }
        }
        else{
            return redirect('/login');
        }
    }
}
