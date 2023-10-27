<?php

namespace App\Http\Controllers;
use App\Models\MolInic;
use App\Models\MolIndics;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function form1(){
        return view('forms/form1');
    }
    public function form2(){
        return view('forms/form2');
    }
    public function form3(){
        return view('forms/form3');
    }
    public function form4(){
        return view('forms/form4');
    }
    public function form5(){
        return view('forms/form5');
    }
    public function login(){
        return view('forms/login');
    }
    public function registerPage(){
        return view('register');
    }
    public function cabinet(){
        $molInics = MolInic::where('user_id', auth()->id())->paginate(5);
        return view('cabinet',compact('molInics'));
    }
    
}
