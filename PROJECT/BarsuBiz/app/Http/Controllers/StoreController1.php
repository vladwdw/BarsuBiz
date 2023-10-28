<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\MolInic;
use App\Models\Molindic;
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
            
 

        } catch (\Exception $e) {
                     dd($e->getMessage());
        }

    }
}