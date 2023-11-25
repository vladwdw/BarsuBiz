<?php

namespace App\Http\Controllers;

use App\Models\BarsuNir;
use App\Models\HudredIdeas;
use App\Models\BarsuNirDop;
use App\Models\Gpni;
use App\Models\Gpni_calculate;
use App\Models\Gpni_obosn;
use App\Models\Gpni_plan;
use App\Models\Grant;
use App\Models\GpniDop;
use App\Models\grant_calculate;
use App\Models\grant_obosn;
use Illuminate\Support\Facades\Auth;
use App\Models\MolInic;
use App\Models\Molindic;
use App\Models\RcpiBp;
use App\Models\RcpiPass;
use App\Models\RcpiPassCheckboxes;
use App\Models\RcpiStrat;
use App\Models\RcpiStratCheckboxes;
use App\Models\RcpiTeo;
use App\Models\Repconc;
use App\Notifications\Delete;
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
            return redirect('cabinet');
 

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
           
            return redirect('cabinet');
 

        } catch (\Exception $e) {
                     dd($e->getMessage());
        }
    }
    }
    public function form11_delete(Request $request)
    {
        $name=$request->name;
        $id=$request->id;
        if($name=="Молодежные инициативы"){
            $molInic= MolInic::find($id);
            if($molInic->user_id==Auth::user()->id || Auth::user()->Role=="Admin"){       
      $molIndic=MolIndic::where('project_id', $id)->delete();
      if(Auth::user()->Role=="Admin"){
        $user = User::where('name', $molInic->owner)->first();
        $data=$molInic->name."_#".$molInic->id;
        $user->notify(new Delete($data));
    }
      $molInic->delete();

            }
            return response()->json(['success' => 'Item deleted successfully']);
        }
        if($name=="Участие в НИР"){
            
           $barsunir= BarsuNir::find($id);
           if($barsunir->user_id==Auth::user()->id || Auth::user()->Role== "Admin"){
            $barsunirdop=BarsuNirDop::where('project_id', $id)->delete();
            if(Auth::user()->Role=="Admin"){
                $user = User::where('name', $barsunir->owner)->first();
                $data=$barsunir->name."_#".$barsunir->id;
                $user->notify(new Delete($data));
            }
            $barsunir->delete();
 
           }
           return response()->json(['success' => 'Item deleted successfully']);
              }
        if($name== '100 ИДЕЙ ДЛЯ БЕЛАРУСИ'){
            $hundredideas=HudredIdeas::find($id);
            if($hundredideas->user_id==Auth::user()->id || Auth::user()->Role== 'Admin'){
                if(Auth::user()->Role=="Admin"){
                    $user = User::where('name', $hundredideas->owner)->first();
                    $data=$hundredideas->name."_#".$hundredideas->id;
                    $user->notify(new Delete($data));
                }
                $hundredideas->delete();

            }
            return response()->json(['success' => 'Item deleted successfully']);
        }
        if($name== 'ГПНИ'){

            
            $gpni=Gpni::find($id);
            if($gpni->user_id==Auth::user()->id || Auth::user()->Role== 'Admin'){
                $gpnidop=GpniDop::where('project_id', $id)->delete();
                $gpni_calculate=Gpni_calculate::where('project_id', $id)->delete();
                $gpni_plan=Gpni_plan::where('project_id', $id)->delete();
                $gpni_obosn=Gpni_obosn::where('project_id', $id)->delete();
                if(Auth::user()->Role=="Admin"){
                    $user = User::where('name', $gpni->owner)->first();
                    $data=$gpni->name."_#".$gpni->id;
                    $user->notify(new Delete($data));
                }
                $gpni->delete();

            }
            return response()->json(['success' => 'Item deleted successfully']);
            
        }
        if($name== 'РКИП'){

            
            $repconc=Repconc::find($id);
           
            if( $repconc->user_id==Auth::user()->id || Auth::user()->Role== 'Admin'){
                if(Auth::user()->Role=="Admin"){
                    $user = User::where('name', $repconc->owner)->first();
                    $data= $repconc->name."_#".$repconc->id;
                    $user->notify(new Delete($data));
                }
                $repStrat=RcpiStrat::where('project_id', $repconc->id)->delete();
                $repStratcheckbox=RcpiStratCheckboxes::where('project_id', $repconc->id)->delete();
                $rcpi_pass_checkboxes=RcpiPassCheckboxes::where('project_id', $repconc->id)->delete();
                $rcpipass=RcpiPass::where('project_id', $repconc->id)->delete();
                $rcpibp=RcpiBp::where('project_id', $repconc->id)->delete();
                $rcpiteo=RcpiTeo::where('project_id',$repconc->id)->delete();
                 $repconc->delete();

            }
            return response()->json(['success' => 'Item deleted successfully']);
            
        }
        if($name== 'Заявка на получение гранта'){
            $grant=Grant::find($id);
            $grant_obosn=grant_obosn::where('project_id', $id)->delete();
            $grant_calculate=grant_calculate::where('project_id', $id)->delete();
            if($grant->user_id==Auth::user()->id || Auth::user()->Role== 'Admin'){
                if(Auth::user()->Role=="Admin"){
                    $user = User::where('name', $grant->owner)->first();
                    $data=$grant->name."_#".$grant->id;
                    $user->notify(new Delete($data));
                }
                $grant->delete();
            }
            return response()->json(['success' => 'Item deleted successfully']);
        }
        
    }
}
