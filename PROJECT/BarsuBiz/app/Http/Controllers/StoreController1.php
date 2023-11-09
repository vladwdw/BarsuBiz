<?php

namespace App\Http\Controllers;

use App\Models\BarsuNir;
use App\Models\HudredIdeas;
use App\Models\BarsuNirDop;
use App\Models\Gpni;
use App\Models\Grant;
use App\Models\GpniDop;
use Illuminate\Support\Facades\Auth;
use App\Models\MolInic;
use App\Models\Molindic;
use App\Models\User;
use App\Notifications\Edit;
use Illuminate\Http\Request;

class StoreController1 extends Controller
{
    public function store(Request $request){

        $projectName = $request->input('projectName');
        $regionName = $request->input('regionName');
        $locality=$request->input('locality');
        $description=$request->input('description');
        $indicator=$request->input('indicator');
        $valueIndicator=$request->input('valueIndicator');
        $realizationTemp=$request->input('realizationTemp');
        $fioRuk=$request->input('fioRuk');
        $phone=$request->input('phone');
        $email=$request->input('email');
        $sostav=$request->input('sostav');
        $dopInformation=$request->input('dopInformation');
        try {
            $molInic = new MolInic();
            $molInic->user_id=Auth::user()->id;
            $molInic->owner=Auth::user()->name;
            $molInic->nameProject=$projectName;
            $molInic->nameRegion=$regionName;
            $molInic->namePunct=$locality;
            $molInic->descriptionProblem=$description;
            $molInic->realizationTemp=$realizationTemp;
            $molInic->fioRuk=$fioRuk;
            $molInic->phone=$phone;
            $molInic->email=$email;
            $molInic->inicGroup=$sostav;
            $molInic->dopInformation=$dopInformation;
            $molInic->save();
            for($i=0; $i<count($indicator); $i++){
            $molIndic=new Molindic();
            $molIndic->project_id=$molInic->id;
            $molIndic->indicator= $indicator[$i];
            $molIndic->value=$valueIndicator[$i];
            $molIndic->save();
            
            }
            return redirect('/cabinet');
 

        } catch (\Exception $e) {
                     dd($e->getMessage());
        }

    }
    public function form11_update(Request $request,$name,$id){
        if($name=="Молодежные инициативы"){
        $projectName = $request->input('projectName');
        $regionName = $request->input('regionName');
        $locality=$request->input('locality');
        $description=$request->input('description');
        $indicator=$request->input('indicator');
        $valueIndicator=$request->input('valueIndicator');
        $realizationTemp=$request->input('realizationTemp');
        $fioRuk=$request->input('fioRuk');
        $phone=$request->input('phone');
        $email=$request->input('email');
        $sostav=$request->input('sostav');
        $dopInformation=$request->input('dopInformation');
        try {
            $molInic = MolInic::find($id);
            $molInic->nameProject=$projectName;
            $molInic->nameRegion=$regionName;
            $molInic->namePunct=$locality;
            $molInic->descriptionProblem=$description;
            $molInic->realizationTemp=$realizationTemp;
            $molInic->fioRuk=$fioRuk;
            $molInic->phone=$phone;
            $molInic->email=$email;
            $molInic->inicGroup=$sostav;
            $molInic->dopInformation=$dopInformation;
            $molInic->save();
            $molIndic=MolIndic::where('project_id', $id)->delete();
           for($i=0; $i<count($indicator); $i++){
            $molIndic=new Molindic();
            $molIndic->project_id=$molInic->id;
            $molIndic->indicator= $indicator[$i];
            $molIndic->value=$valueIndicator[$i];
            $molIndic->save();
            }
            if(Auth::user()->Role=="Admin"){
                $user = User::where('name', $molInic->owner)->first();
                $data=$molInic->name."_#".$molInic->id;
                $user->notify(new Edit($data));
            }
           
            return redirect('\cabinet');
 

        } catch (\Exception $e) {
                     dd($e->getMessage());
        }
    }
    }
    public function form11_delete($name,$id)
    {
        if($name=="Молодежные инициативы"){
      $molIndic=MolIndic::where('project_id', $id)->delete();
     $molInic= MolInic::find($id)->delete();
        return redirect('\cabinet');
        }
        if($name=="Участие в НИР"){
            $barsunirdop=BarsuNirDop::where('project_id', $id)->delete();
           $barsunir= BarsuNir::find($id)->delete();
              return redirect('\cabinet');
              }
        if($name== '100 ИДЕЙ ДЛЯ БЕЛАРУСИ'){
            $hundredideas=HudredIdeas::find($id)->delete();
            return redirect('\cabinet');
        }
        if($name== 'ГПНИ'){

            $gpnidop=GpniDop::where('project_id', $id)->delete();
            $gpni=Gpni::find($id)->delete();
            return redirect('cabinet');
            
        }
        if($name== 'Заявка на получение гранта'){
            $grant=Grant::find($id)->delete();
            return redirect('cabinet');
        }
        
    }
}
