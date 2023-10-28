<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\BarsuNir;
use App\Models\BarsuNirDop;
use Illuminate\Http\Request;

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
        // BarsuNir_dop
        $workEtap = $request->input('workEtap');
        $nachSrok = $request->input('nachSrok');
        $endSrok = $request->input('endSrok');
        $kontrResult = $request->input('kontrResult');
        try {
            $barsunir = new BarsuNir();
            $barsunir->user_id=Auth::user()->id;
            $barsunir->sinceDir=$sinceDir;
            $barsunir->workTheme=$workTheme;
            $barsunir->nirRuks=$nirRuks;
            $barsunir->realizationTemp=$realizationTemp;
            $barsunir->phone=$phone;
            $barsunir->obosnovanie=$obosnovanie;
            $barsunir->sinceElem=$sinceElem;
            $barsunir->ozhidResult=$ozhidResult;
            $barsunir->praktZnach=$praktZnach;
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
            
 

        } catch (\Exception $e) {
                     dd($e->getMessage());
        }

    }
}
