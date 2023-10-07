<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function form1(){
        return view('forms/form1');
    }
    
}
