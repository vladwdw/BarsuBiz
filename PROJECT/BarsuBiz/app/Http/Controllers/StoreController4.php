<?php

namespace App\Http\Controllers;
use App\Models\Gpni;
use App\Models\Gpni_calculate;
use App\Models\Gpni_obosn;
use App\Models\GpniDop;
use App\Models\Gpni_plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\Edit;
class StoreController4 extends Controller
{
    public function store(Request $request){
       $number=$request->input('number');
       $data=$request->input('data');
       $year=$request->input('year');
        $sinceDir= $request->input('sinceDir');
        $nameN= $request->input('nameN');
        $nameP= $request->input('nameP');
        $orgZav= $request->input('orgZav');
        $fio= $request->input('fio');
        $uchStep= $request->input('uchStep');
        $uchZav= $request->input('uchZav');
        $kafLab= $request->input('kafLab');
        $phone= $request->input('phone');
        $email= $request->input('email');
        $nach=$request->input('nach');
        $end= $request->input('end');
        $allCost= $request->input('allCost');
        $fin1= $request->input('fin1');
        $fin2= $request->input('fin2');
        $fin3= $request->input('fin3');
        try{
            $gpni=new Gpni();
            $gpni->owner=Auth::user()->name;
            $gpni->user_id=Auth::user()->id;
            $gpni->number=$number;
            $gpni->data=$data;
            $gpni->year=$year;
            
            $gpni->sinceDir = $sinceDir;
            $gpni->nameN = $nameN;
            $gpni->nameP = $nameP;
            $gpni->orgZav = $orgZav;
            $gpni->nach = $nach;
            $gpni->end = $end;
            $gpni->allCost = $allCost;
            $gpni->fin1 = $fin1;
            $gpni->fin2 = $fin2;
            $gpni->fin3 = $fin3;
            $gpni->save();
            for($i = 0; $i < count($fio); $i++ ){
                $gpniDop=new GpniDop();
                $gpniDop->project_id=$gpni->id;
                $gpniDop->fio= $fio[$i];
                $gpniDop->uchStep= $uchStep[$i];
                $gpniDop->uchZav=$uchZav[$i];
                $gpniDop->kafLab= $kafLab[$i];
                $gpniDop->phone= $phone[$i];
                $gpniDop->email= $email[$i];
                $gpniDop->save();
                
                
            }
            $this->plan( $request,$gpni);
            $this->calculate( $request,$gpni);
            $this->obosn( $request,$gpni);
            return redirect('/cabinet');
        }
        catch (\Exception $e) {
            dd($e->getMessage());
}
    }
    public function calculate(Request $request, Gpni $gpni){
        $totalCalculate1= $request->input('totalCalculate1');
        $totalCalculate2= $request->input('totalCalculate2');
        $totalCalculate3= $request->input('totalCalculate3');
        $totalCalculate4= $request->input('totalCalculate4');
        $totalCalculate5= $request->input('totalCalculate5');
        $totalCalculate6= $request->input('totalCalculate6');
        $totalCalculate7= $request->input('totalCalculate7');
        $totalCalculate8= $request->input('totalCalculate8');
        $firstCalculate1= $request->input('firstCalculate1');   
        $firstCalculate2= $request->input('firstCalculate2');
        $firstCalculate3= $request->input('firstCalculate3');
         $firstCalculate4= $request->input('firstCalculate4');
         $firstCalculate5= $request->input('firstCalculate5');
         $firstCalculate6= $request->input('firstCalculate6');
         $firstCalculate7= $request->input('firstCalculate7');
         $firstCalculate8= $request->input('firstCalculate8');
      
        try{
            $gpni_calculate = new Gpni_calculate();
            $gpni_calculate->project_id=$gpni->id;
            $gpni_calculate->totalCalculate1=$totalCalculate1;
            $gpni_calculate->totalCalculate2=$totalCalculate2;
            $gpni_calculate->totalCalculate3=$totalCalculate3;
            $gpni_calculate->totalCalculate4=$totalCalculate4;
            $gpni_calculate->totalCalculate5=$totalCalculate5;
            $gpni_calculate->totalCalculate6=$totalCalculate6;
            $gpni_calculate->totalCalculate7=$totalCalculate7;
            $gpni_calculate->totalCalculate8=$totalCalculate8;
            $gpni_calculate->firstCalculate1=$firstCalculate1;
            $gpni_calculate->firstCalculate2=$firstCalculate2;
            $gpni_calculate->firstCalculate3=$firstCalculate3;
            $gpni_calculate->firstCalculate4=$firstCalculate4;
            $gpni_calculate->firstCalculate5=$firstCalculate5;
            $gpni_calculate->firstCalculate6=$firstCalculate6;
            $gpni_calculate->firstCalculate7=$firstCalculate7;
            $gpni_calculate->firstCalculate8=$firstCalculate8;
            $gpni_calculate->totalCalculateSum=$totalCalculate1+$totalCalculate2+$totalCalculate3+$totalCalculate4+$totalCalculate5+$totalCalculate6+$totalCalculate7+$totalCalculate8;
            $gpni_calculate->firstCalculateSum=$firstCalculate1+$firstCalculate2+$firstCalculate3+$firstCalculate4+$firstCalculate5+$firstCalculate6+$firstCalculate7+$firstCalculate8;
            $gpni_calculate->save();
           
        }
        catch (\Exception $e) {
            dd($e->getMessage());
}
    }
    public function obosn(Request $request, Gpni $gpni){
        $name_nir= $request->input('name_nir');
        $goals_nir= $request->input('goals_nir');
        $relevance_nir= $request->input('relevance_nir');
        $results_nir= $request->input('results_nir');
        $plan_results_nir= $request->input('plan_results_nir');
        $volume_nir= $request->input('volume_nir');
       
      
        try{
            $gpni_obosn = new Gpni_obosn();
            $gpni_obosn->project_id=$gpni->id;
            $gpni_obosn->name_nir=$name_nir;
            $gpni_obosn->goals_nir=$goals_nir;
            $gpni_obosn->relevance_nir=$relevance_nir;
            $gpni_obosn->results_nir=$results_nir;
            $gpni_obosn->plan_results_nir=$plan_results_nir;
            $gpni_obosn->volume_nir=$volume_nir;
            $gpni_obosn->save();
           
        }
        catch (\Exception $e) {
            dd($e->getMessage());
}
    }
    public function obosn_update(Request $request,$id){
        $name_nir= $request->input('name_nir');
        $goals_nir= $request->input('goals_nir');
        $relevance_nir= $request->input('relevance_nir');
        $results_nir= $request->input('results_nir');
        $plan_results_nir= $request->input('plan_results_nir');
        $volume_nir= $request->input('volume_nir');
       
        $gpni_obosn =Gpni_obosn::where('project_id', $id)->delete();
        try{
            $gpni_obosn = new Gpni_obosn();
            $gpni_obosn->project_id=$id;
            $gpni_obosn->name_nir=$name_nir;
            $gpni_obosn->goals_nir=$goals_nir;
            $gpni_obosn->relevance_nir=$relevance_nir;
            $gpni_obosn->results_nir=$results_nir;
            $gpni_obosn->plan_results_nir=$plan_results_nir;
            $gpni_obosn->volume_nir=$volume_nir;
            $gpni_obosn->save();
           
        }
        catch (\Exception $e) {
            dd($e->getMessage());
}
    }
    public function calculate_update(Request $request, $id){
        $totalCalculate1= $request->input('totalCalculate1');
        $totalCalculate2= $request->input('totalCalculate2');
        $totalCalculate3= $request->input('totalCalculate3');
        $totalCalculate4= $request->input('totalCalculate4');
        $totalCalculate5= $request->input('totalCalculate5');
        $totalCalculate6= $request->input('totalCalculate6');
        $totalCalculate7= $request->input('totalCalculate7');
        $totalCalculate8= $request->input('totalCalculate8');
        $firstCalculate1= $request->input('firstCalculate1');   
        $firstCalculate2= $request->input('firstCalculate2');
        $firstCalculate3= $request->input('firstCalculate3');
         $firstCalculate4= $request->input('firstCalculate4');
         $firstCalculate5= $request->input('firstCalculate5');
         $firstCalculate6= $request->input('firstCalculate6');
         $firstCalculate7= $request->input('firstCalculate7');
         $firstCalculate8= $request->input('firstCalculate8');
         $gpni_calculate =Gpni_calculate::where('project_id', $id)->delete();
        try{
            $gpni_calculate = new Gpni_calculate();
            $gpni_calculate->project_id=$id;
            $gpni_calculate->totalCalculate1=$totalCalculate1;
            $gpni_calculate->totalCalculate2=$totalCalculate2;
            $gpni_calculate->totalCalculate3=$totalCalculate3;
            $gpni_calculate->totalCalculate4=$totalCalculate4;
            $gpni_calculate->totalCalculate5=$totalCalculate5;
            $gpni_calculate->totalCalculate6=$totalCalculate6;
            $gpni_calculate->totalCalculate7=$totalCalculate7;
            $gpni_calculate->totalCalculate8=$totalCalculate8;
            $gpni_calculate->firstCalculate1=$firstCalculate1;
            $gpni_calculate->firstCalculate2=$firstCalculate2;
            $gpni_calculate->firstCalculate3=$firstCalculate3;
            $gpni_calculate->firstCalculate4=$firstCalculate4;
            $gpni_calculate->firstCalculate5=$firstCalculate5;
            $gpni_calculate->firstCalculate6=$firstCalculate6;
            $gpni_calculate->firstCalculate7=$firstCalculate7;
            $gpni_calculate->firstCalculate8=$firstCalculate8;
            $gpni_calculate->totalCalculateSum=$totalCalculate1+$totalCalculate2+$totalCalculate3+$totalCalculate4+$totalCalculate5+$totalCalculate6+$totalCalculate7;
            $gpni_calculate->firstCalculateSum=$firstCalculate1+$firstCalculate2+$firstCalculate3+$firstCalculate4+$firstCalculate5+$firstCalculate6+$firstCalculate7;
            $gpni_calculate->save();
           
        }
        catch (\Exception $e) {
            dd($e->getMessage());
}
    }
    public function plan(Request $request, Gpni $gpni){
        $direction= $request->input('direction');
        $Carryingout= $request->input('Carryingout');
        $nameingeneral= $request->input('nameingeneral');
        $nachPlanneddates= $request->input('nachPlanneddates');
        $endPlanneddates= $request->input('endPlanneddates');
        $totalcost= $request->input('totalcost');
        $results= $request->input('results');
        $name1p= $request->input('name1p');
        $nachPlanneddates1p= $request->input('nachPlanneddates1p');
        $endPlanneddates1p= $request->input('endPlanneddates1p');
        $totalcost1p= $request->input('totalcost1p');
        $results1p=$request->input('results1p');
        $name2p= $request->input('name2p');
        $nachPlanneddates2p= $request->input('nachPlanneddates2p');
        $endPlanneddates2p= $request->input('endPlanneddates2p');
        $totalcost2p= $request->input('totalcost2p');
        $results2p= $request->input('results2p');
        try{
            $gpni_plan = new Gpni_plan();
            $gpni_plan->project_id=$gpni->id;
            $gpni_plan->direction=$direction;
            $gpni_plan->Carryingout=$Carryingout;
            $gpni_plan->nameingeneral=$nameingeneral;
            $gpni_plan->nachPlanneddates=$nachPlanneddates;
            $gpni_plan->endPlanneddates=$endPlanneddates;
            $gpni_plan->totalcost=$totalcost;
            $gpni_plan->results=$results;
            $gpni_plan->name1p=$name1p;
            $gpni_plan->nachPlanneddates1p=$nachPlanneddates1p;
            $gpni_plan->endPlanneddates1p=$endPlanneddates1p;
            $gpni_plan->totalcost1p=$totalcost1p;
            $gpni_plan->results1p=$results1p;
            $gpni_plan->name2p=$name2p;
            $gpni_plan->nachPlanneddates2p=$nachPlanneddates2p;
            $gpni_plan->endPlanneddates2p=$endPlanneddates2p;
            $gpni_plan->totalcost2p=$totalcost2p;
            $gpni_plan->results2p=$results2p;
            $gpni_plan->save();
           
        }
        catch (\Exception $e) {
            dd($e->getMessage());
}
    }
    public function plan_update(Request $request,$id)
    {
        $direction= $request->input('direction');
        $Carryingout= $request->input('Carryingout');
        $nameingeneral= $request->input('nameingeneral');
        $nachPlanneddates= $request->input('nachPlanneddates');
        $endPlanneddates= $request->input('endPlanneddates');
        $totalcost= $request->input('totalcost');
        $results= $request->input('results');
        $name1p= $request->input('name1p');
        $nachPlanneddates1p= $request->input('nachPlanneddates1p');
        $endPlanneddates1p= $request->input('endPlanneddates1p');
        $totalcost1p= $request->input('totalcost1p');
        $results1p=$request->input('results1p');
        $name2p= $request->input('name2p');
        $nachPlanneddates2p= $request->input('nachPlanneddates2p');
        $endPlanneddates2p= $request->input('endPlanneddates2p');
        $totalcost2p= $request->input('totalcost2p');
        $results2p= $request->input('results2p');
        $gpni_plan =Gpni_plan::where('project_id', $id)->delete();
        try{
            $gpni_plan=new Gpni_plan();
            $gpni_plan->project_id=$id;
            $gpni_plan->direction=$direction;
            $gpni_plan->Carryingout=$Carryingout;
            $gpni_plan->nameingeneral=$nameingeneral;
            $gpni_plan->nachPlanneddates=$nachPlanneddates;
            $gpni_plan->endPlanneddates=$endPlanneddates;
            $gpni_plan->totalcost=$totalcost;
            $gpni_plan->results=$results;
            $gpni_plan->name1p=$name1p;
            $gpni_plan->nachPlanneddates1p=$nachPlanneddates1p;
            $gpni_plan->endPlanneddates1p=$endPlanneddates1p;
            $gpni_plan->totalcost1p=$totalcost1p;
            $gpni_plan->results1p=$results1p;
            $gpni_plan->name2p=$name2p;
            $gpni_plan->nachPlanneddates2p=$nachPlanneddates2p;
            $gpni_plan->endPlanneddates2p=$endPlanneddates2p;
            $gpni_plan->totalcost2p=$totalcost2p;
            $gpni_plan->results2p=$results2p;
            $gpni_plan->save();
           
        }
        catch (\Exception $e) {
            dd($e->getMessage());
}
    }
    public function form44_update(Request $request,$name,$id){
        
        $number=$request->input('number');
        $data=$request->input('data');
        $year=$request->input('year');
         $sinceDir= $request->input('sinceDir');
         $nameN= $request->input('nameN');
         $nameP= $request->input('nameP');
         $orgZav= $request->input('orgZav');
         $fio= $request->input('fio');
         $uchStep= $request->input('uchStep');
         $uchZav= $request->input('uchZav');
         $kafLab= $request->input('kafLab');
         $phone= $request->input('phone');
         $email= $request->input('email');
         $nach=$request->input('nach');
         $end= $request->input('end');
         $allCost= $request->input('allCost');
         $fin1= $request->input('fin1');
         $fin2= $request->input('fin2');
         $fin3= $request->input('fin3');
         try {
            $gpni=Gpni::findOrFail($id);
           
            $gpni->number = $number;
            $gpni->data = $data;
            $gpni->year = $year;
            $gpni->sinceDir = $sinceDir;
            $gpni->nameN = $nameN;
            $gpni->nameP = $nameP;
            $gpni->orgZav = $orgZav;
            $gpni->nach = $nach;
            $gpni->end = $end;
            $gpni->allCost = $allCost;
            $gpni->fin1 = $fin1;
            $gpni->fin2 = $fin2;
            $gpni->fin3 = $fin3;
            $gpniDop=GpniDop::where('project_id', $id)->delete();
            $gpni->save();
            for($i = 0; $i < count($fio); $i++ ){
                $gpniDop=new GpniDop();
                $gpniDop->project_id=$gpni->id;
                $gpniDop->fio= $fio[$i];
                $gpniDop->uchStep= $uchStep[$i];
                $gpniDop->uchZav=$uchZav[$i];
                $gpniDop->kafLab= $kafLab[$i];
                $gpniDop->phone= $phone[$i];
                $gpniDop->email= $email[$i];
                $gpniDop->save();
                

            }
            $this->plan_update($request,$id);
            $this->calculate_update($request,$id);
            $this->obosn_update($request,$id);
            //$this->plan_update($request,$id);
            if(Auth::user()->Role=="Admin"){
                $user = User::where('name', $gpni->owner)->first();
                $data=$gpni->name."_#".$gpni->id;
                $user->notify(new Edit($data));
            }
            return redirect('cabinet');
        }
        catch (\Exception $e) {
            return redirect('cabinet')->with('notFound','Заявка не найдена');
}

    }
}
