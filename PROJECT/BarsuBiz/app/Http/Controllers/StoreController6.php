<?php

namespace App\Http\Controllers;
use App\Models\Repconc;
use App\Notifications\Edit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class StoreController6 extends Controller
{
    public function store(Request $request){
        try{
        dd($request->all());
        $nominationName=$request->input('nominationName');
        $nameProject=$request->input('nameProject');
        $fio=$request->input('fio');
        $teachWorkPlace=$request->input('teachWorkPlace');
        $dolzhnUch=$request->input('dolzhnUch');
        $uchStep=$request->input('uchStep');
        $adress=$request->input('adress');
        $phone=$request->input('phone');
        $email=$request->input('email');
        $projectLink=$request->input('projectLink');
        $yurName=$request->input('yurName');
        $fioRuk=$request->input('fioRuk');
        $dolzhnYur=$request->input('dolzhnYur');
        $yurStep=$request->input('yurStep');
        $yurAdress=$request->input('yurAdress');
        $platNumber=$request->input('platNumber');
        $yurPhone=$request->input('yurPhone');
        $yurEmail=$request->input('yurEmail');
        $fioCommand=$request->input('fioCommand');
        $yurLink=$request->input('yurLink');

        $repconc=new Repconc();
        $repconc->owner=Auth::user()->name;
        $repconc->user_id=Auth::user()->id;
        $repconc->nominationName=$nominationName;
        $repconc->nameProject=$nameProject;
        $repconc->fio= $fio;
        
        $repconc->teachWorkPlace=$teachWorkPlace;
        $repconc->dolzhnUch=$dolzhnUch;
        $repconc->uchStep= $uchStep;
        $repconc->adress=$adress;
        $repconc->phone= $phone;
        $repconc->email= $email;
        $repconc->projectLink= $projectLink;
        $repconc->yurName=$yurName;
        $repconc->yurEmail=$yurEmail;
        $repconc->fioRuk= $fioRuk;
        $repconc->dolzhnYur= $dolzhnYur;
        $repconc->yurStep= $yurStep;
        $repconc->yurAdress= $yurAdress;
        $repconc->platNumber=$platNumber;
        $repconc->yurPhone=$yurPhone;
        $repconc->fioCommand=$fioCommand;
        $repconc->yurLink=$yurLink;
        $repconc->save();
        return redirect('cabinet');

        }catch(\Exception $e){
            dd($e->getMessage());
        }
      }
      public function form66_update(Request $request, $name,$id){

  
        try{
            $nominationName=$request->input('nominationName');
            $nameProject=$request->input('nameProject');
            $fio=$request->input('fio');
            $teachWorkPlace=$request->input('teachWorkPlace');
            $dolzhnUch=$request->input('dolzhnUch');
            $uchStep=$request->input('uchStep');
            $adress=$request->input('adress');
            $phone=$request->input('phone');
            $email=$request->input('email');
            $projectLink=$request->input('projectLink');
            $yurName=$request->input('yurName');
            $fioRuk=$request->input('fioRuk');
            $dolzhnYur=$request->input('dolzhnYur');
            $yurStep=$request->input('yurStep');
            $yurAdress=$request->input('yurAdress');
            $platNumber=$request->input('platNumber');
            $yurPhone=$request->input('yurPhone');
            $yurEmail=$request->input('yurEmail');
            $fioCommand=$request->input('fioCommand');
            $yurLink=$request->input('yurLink');

          $repconc=Repconc::find($id);
          $repconc->owner=Auth::user()->name;
          $repconc->user_id=Auth::user()->id;
          $repconc->nominationName=$nominationName;
          $repconc->nameProject=$nameProject;
          $repconc->fio= $fio;
          
          $repconc->teachWorkPlace=$teachWorkPlace;
          $repconc->dolzhnUch=$dolzhnUch;
          $repconc->uchStep= $uchStep;
          $repconc->adress=$adress;
          $repconc->phone= $phone;
          $repconc->email= $email;
          $repconc->projectLink= $projectLink;
          $repconc->yurName=$yurName;
          $repconc->yurEmail=$yurEmail;
          $repconc->fioRuk= $fioRuk;
          $repconc->dolzhnYur= $dolzhnYur;
          $repconc->yurStep= $yurStep;
          $repconc->yurAdress= $yurAdress;
          $repconc->platNumber=$platNumber;
          $repconc->yurPhone=$yurPhone;
          $repconc->fioCommand=$fioCommand;
          $repconc->yurLink=$yurLink;
          $repconc->save();
          if(Auth::user()->Role=="Admin"){
            $user = User::where('name', $repconc->owner)->first();
            $data=$repconc->name."_#".$repconc->id;
            $user->notify(new Edit($data));
        }
          return redirect('cabinet');
          }catch(\Exception $e){
              dd($e->getMessage());
          }
    
      }
}
