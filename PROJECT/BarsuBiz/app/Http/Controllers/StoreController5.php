<?php

namespace App\Http\Controllers;
use App\Models\Grant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StoreController5 extends Controller
{
  public function store(Request $request){
    try{
    $sienceDirection=$request->input('sienceDirection');
    $fioGrad=$request->input('fioGrad');
    $grandCategory=$request->input('grandCategory');
    $workName=$request->input('workName');
    $disertationTheme=$request->input('disertationTheme');
    $uchrName=$request->input('uchrName');
    $special=$request->input('special');
    $knowledge=$request->input('knowledge');
    $grant=new Grant();
    $grant->owner=Auth::user()->name;
    $grant->user_id=Auth::user()->id;
    $grant->sienceDirection=$sienceDirection;
    $grant->fioGrad=$fioGrad;
    $grant->grandCategory=$grandCategory;
    $grant->workName=$workName;
    $grant->disertationTheme=$disertationTheme;
    $grant->uchrName=$uchrName;
    $grant->special=$special;
    $grant->knowledge=$knowledge;
    $grant->save();
    return redirect('cabinet');
    }catch(\Exception $e){
        dd($e->getMessage());
    }
  }
  public function form55_update(Request $request, $name,$id){

  
    try{
      $sienceDirection=$request->input('sienceDirection');
      $fioGrad=$request->input('fioGrad');
      $grandCategory=$request->input('grandCategory');
      $workName=$request->input('workName');
      $disertationTheme=$request->input('disertationTheme');
      $uchrName=$request->input('uchrName');
      $special=$request->input('special');
      $knowledge=$request->input('knowledge');
      $grant=Grant::find($id);
      $grant->sienceDirection=$sienceDirection;
      $grant->fioGrad=$fioGrad;
      $grant->grandCategory=$grandCategory;
      $grant->workName=$workName;
      $grant->disertationTheme=$disertationTheme;
      $grant->uchrName=$uchrName;
      $grant->special=$special;
      $grant->knowledge=$knowledge;
      $grant->save();
      return redirect('cabinet');
      }catch(\Exception $e){
          dd($e->getMessage());
      }

  }

}
