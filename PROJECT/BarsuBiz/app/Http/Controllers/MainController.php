<?php

namespace App\Http\Controllers;

use App\Models\BarsuNir;
use App\Models\BarsuNirDop;
use App\Models\MolInic;
use App\Models\MolIndic;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\Auth;
use Aneeskhan47\PaginationMerge\Facades\PaginationMerge;
class MainController extends Controller
{
    public function form1(){
        return view('forms/form1');
    }
    public function form11($name,$id){
        if($name=="Молодежные инициативы"){
        $molIndic=MolIndic::where('project_id', $id)->get();
        $molInic=MolInic::find($id);
        return view('forms/form11',compact('molInic','molIndic'));
        }
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
        $molInics = MolInic::where('user_id', auth()->id());
        $barsunirs = BarsuNir::where('user_id', auth()->id());

        $items = $molInics->union($barsunirs)->orderBy('created_at', 'desc')->paginate(7);
        return view('cabinet', compact('items'));
    }
    
}
