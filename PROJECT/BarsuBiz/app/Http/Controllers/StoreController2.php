<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\BarsuNir;
use App\Models\BarsuNirDop;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\Edit;
class StoreController2 extends Controller
{
    public function store(Request $request){
       // BarsuNir
        $sinceDir = $request->input('sinceDir');
        $workTheme = $request->input('workTheme');
        $nirRuks = $request->input('nirRuks');
        $realizationTemp = $request->input('realizationTemp');
        $phone = $request->input('phone');
        $obosnovanie = $request->input('obosnovanie');
        $sinceElem = $request->input('sinceElem');
        $ozhidResult = $request->input('ozhidResult');
        $praktZnach = $request->input('praktZnach');
        $goalsNir=$request->input('goalsNir');
        // BarsuNir_dop
        $workEtap = $request->input('workEtap');
        $nachSrok = $request->input('nachSrok');
        $endSrok = $request->input('endSrok');
        $kontrResult = $request->input('kontrResult');
        try {
            $barsunir = new BarsuNir();
            $barsunir->user_id=Auth::user()->id;
            $barsunir->owner=Auth::user()->name;
            $barsunir->sinceDir=$sinceDir;
            $barsunir->workTheme=$workTheme;
            $barsunir->nirRuks=$nirRuks;
            $barsunir->realizationTemp=$realizationTemp;
            $barsunir->phone=$phone;
            $barsunir->obosnovanie=$obosnovanie;
            $barsunir->sinceElem=$sinceElem;
            $barsunir->ozhidResult=$ozhidResult;
            $barsunir->praktZnach=$praktZnach;
            $barsunir->goalsNir=$goalsNir;
            $barsunir->save();
            for($i=0; $i<count($workEtap); $i++){
            $BarsuNirDop=new BarsuNirDop();
            $BarsuNirDop->project_id=$barsunir->id;
            $BarsuNirDop->workEtap= $workEtap[$i];
            $BarsuNirDop->nachSrok= $nachSrok[$i];
            $BarsuNirDop->endSrok= $endSrok[$i];
            $BarsuNirDop->kontrResult=$kontrResult[$i];
            $BarsuNirDop->save();
           
            }

             return redirect('/cabinet');
 

        } catch (\Exception $e) {
                     dd($e->getMessage());
        }

    }
    public function form22_update(Request $request,$name,$id){
        if($name=="Участие в НИР"){
            $sinceDir = $request->input('sinceDir');
            $workTheme = $request->input('workTheme');
            $nirRuks = $request->input('nirRuks');
            $realizationTemp = $request->input('realizationTemp');
            $phone = $request->input('phone');
            $obosnovanie = $request->input('obosnovanie');
            $sinceElem = $request->input('sinceElem');
            $ozhidResult = $request->input('ozhidResult');
            $praktZnach = $request->input('praktZnach');
            $goalsNir=$request->input('goalsNir');
            // BarsuNir_dop
            $workEtap = $request->input('workEtap');
            $nachSrok = $request->input('nachSrok');
            $endSrok = $request->input('endSrok');
            $kontrResult = $request->input('kontrResult');
    
            try {
                $barsunir = BarsuNir::find($id);
                $barsunir->sinceDir=$sinceDir;
                $barsunir->workTheme=$workTheme;
                $barsunir->nirRuks=$nirRuks;
                $barsunir->realizationTemp=$realizationTemp;
                $barsunir->phone=$phone;
                $barsunir->obosnovanie=$obosnovanie;
                $barsunir->sinceElem=$sinceElem;
                $barsunir->ozhidResult=$ozhidResult;
                $barsunir->praktZnach=$praktZnach;
                $barsunir->goalsNir=$goalsNir;
                $barsunir->save();
                $BarsuNirDop=BarsuNirDop::where('project_id', $id)->delete();
                for($i=0; $i<count($workEtap); $i++){
                $BarsuNirDop=new BarsuNirDop();
                $BarsuNirDop->project_id=$barsunir->id;
                $BarsuNirDop->workEtap= $workEtap[$i];
                $BarsuNirDop->nachSrok= $nachSrok[$i];
                $BarsuNirDop->endSrok= $endSrok[$i];
                $BarsuNirDop->kontrResult=$kontrResult[$i];
                $BarsuNirDop->save();
               
                }
                if(Auth::user()->Role=="Admin"){
                    $user = User::where('name', $barsunir->owner)->first();
                    $data=$barsunir->name."_#".$barsunir->id;
                    $user->notify(new Edit($data));
                }
                 return redirect('/cabinet');
     
    
            } catch (\Exception $e) {
                         dd($e->getMessage());
            }
    
    }

}
public function form22_delete($name,$id)
{
    if($name=="Молодежные инициативы"){
  $barsunirdop=BarsuNirDop::where('project_id', $id)->delete();
 $barsunir= BarsuNir::find($id)->delete();
    return redirect('\cabinet');
    }
    
}
}
