<?php

namespace App\Http\Controllers;
use App\Models\Gpni;
use App\Models\GpniDop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StoreController4 extends Controller
{
    public function store(Request $request){
        $sinceDir= $request->input('sinceDir');
        $namePr= $request->input('namePr');
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
            $gpni->user_id=Auth::user()->id;
            $gpni->sinceDir = $sinceDir;
            $gpni->namePr = $namePr;
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
            return redirect('/cabinet');
        }
        catch (\Exception $e) {
            dd($e->getMessage());
}
    }
}
