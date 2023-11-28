<?php

namespace App\Http\Controllers;
use App\Models\Grant;
use App\Models\grant_calculate;
use App\Models\grant_obosn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\Edit;
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
    $this->obosn($request,$grant);
    $this->calculate($request,$grant);
    return redirect('cabinet');
    }catch(\Exception $e){
        dd($e->getMessage());
    }
  }
  public function obosn(Request $request, Grant $grant){
    $goal= $request->input('goal');
    $idea= $request->input('idea');
    $struct= $request->input('struct');
    $state= $request->input('state');
    $rezults= $request->input('rezults');
    $field= $request->input('field');
    $info= $request->input('info');
 
    try{
        $grant_obosn = new grant_obosn();
        $grant_obosn->project_id=$grant->id;
        $grant_obosn->goal=$goal;
        $grant_obosn->idea=$idea;
        $grant_obosn->struct=$struct;
        $grant_obosn->state=$state;
        $grant_obosn->rezults=$rezults;
        $grant_obosn->field=$field;
        $grant_obosn->info=$info;
        $grant_obosn->save();
       
    }
    catch (\Exception $e) {
        dd($e->getMessage());
}
}
public function obosn_update(Request $request, $id){
  $goal= $request->input('goal');
  $idea= $request->input('idea');
  $struct= $request->input('struct');
  $state= $request->input('state');
  $rezults= $request->input('rezults');
  $field= $request->input('field');
  $info= $request->input('info');
  $grant_obosn =grant_obosn::where('project_id', $id)->delete();
  try{
      $grant_obosn = new grant_obosn();
      $grant_obosn->project_id=$id;
      $grant_obosn->goal=$goal;
      $grant_obosn->idea=$idea;
      $grant_obosn->struct=$struct;
      $grant_obosn->state=$state;
      $grant_obosn->rezults=$rezults;
      $grant_obosn->field=$field;
      $grant_obosn->info=$info;
      $grant_obosn->save();
     
  }
  catch (\Exception $e) {
      dd($e->getMessage());
}
}
public function calculate(Request $request, Grant $grant){
  $pay= $request->input('pay');
  $accruals= $request->input('accruals');
  $materials= $request->input('materials');
  $business= $request->input('business');
  $invoices= $request->input('invoices');

  $costs= $request->input('costs');


  try{
      $grant_calculate = new grant_calculate();
      $grant_calculate->project_id=$grant->id;
      $grant_calculate->pay=$pay;
      $grant_calculate->accruals=$accruals;
      $grant_calculate->materials=$materials;
      $grant_calculate->business=$business;
      $grant_calculate->invoices=$invoices;
      $grant_calculate->costs=$costs;
      $grant_calculate->sum=$pay+$accruals+$materials+$business+$invoices+$costs;
      $grant_calculate->save();
     
  }
  catch (\Exception $e) {
      dd($e->getMessage());
}
}
public function calculate_update(Request $request, $id){
  $pay= $request->input('pay');
  $accruals= $request->input('accruals');
  $materials= $request->input('materials');
  $business= $request->input('business');
  $invoices= $request->input('invoices');

  $costs= $request->input('costs');

  $grant_calculate =grant_calculate::where('project_id', $id)->delete();
  try{
      $grant_calculate = new grant_calculate();
      $grant_calculate->project_id=$id;
      $grant_calculate->pay=$pay;
      $grant_calculate->accruals=$accruals;
      $grant_calculate->materials=$materials;
      $grant_calculate->business=$business;
      $grant_calculate->invoices=$invoices;
      $grant_calculate->costs=$costs;
      $grant_calculate->sum=$pay+$accruals+$materials+$business+$invoices+$costs;
      $grant_calculate->save();
     
  }
  catch (\Exception $e) {
      dd($e->getMessage());
}
}
  public function form55_update(Request $request, $name,$id){

  
    
      $sienceDirection=$request->input('sienceDirection');
      $fioGrad=$request->input('fioGrad');
      $grandCategory=$request->input('grandCategory');
      $workName=$request->input('workName');
      $disertationTheme=$request->input('disertationTheme');
      $uchrName=$request->input('uchrName');
      $special=$request->input('special');
      $knowledge=$request->input('knowledge');
      try{
      $grant=Grant::findOrFail($id);
      
      $grant->sienceDirection=$sienceDirection;
      $grant->fioGrad=$fioGrad;
      $grant->grandCategory=$grandCategory;
      $grant->workName=$workName;
      $grant->disertationTheme=$disertationTheme;
      $grant->uchrName=$uchrName;
      $grant->special=$special;
      $grant->knowledge=$knowledge;
      $grant->save();
      if(Auth::user()->Role=="Admin"){
        $user = User::where('name', $grant->owner)->first();
        $data=$grant->name."_#".$grant->id;
        $user->notify(new Edit($data));
    }
    $this->obosn_update($request,$id);
    $this->calculate_update($request,$id);
      return redirect('cabinet');
      }catch(\Exception $e){
        return redirect('cabinet')->with('notFound','Заявка не найдена');
      }

  }

}
