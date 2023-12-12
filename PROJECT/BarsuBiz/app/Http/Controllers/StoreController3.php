<?php

namespace App\Http\Controllers;
use App\Models\HudredIdeas;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\Edit;
class StoreController3 extends Controller
{
    public function store(Request $request){

        $name_project=$request->input('name_project');
        $name_autors=$request->input('name_autors');
        $relevance=$request->input('relevance');
        $goals_objectives=$request->input('goals_objectives');
        $property_protection=$request->input('property_protection');
        $offers=$request->input('offers');
        $advantages_project=$request->input('advantages_project');
        try{
            $hundredideas=new HudredIdeas();
            $hundredideas->user_id=Auth::user()->id;
            $hundredideas->owner=Auth::user()->name;
            $hundredideas->name_project=$name_project;
            $hundredideas->name_autors=$name_autors;
            $hundredideas->relevance=$relevance;
            $hundredideas->goals_objectives=$goals_objectives;
            $hundredideas->property_protection=$property_protection;
            $hundredideas->offers=$offers;
            $hundredideas->advantages_project=$advantages_project;
            $hundredideas->save();
            return redirect('cabinet');
        }
        catch (\Exception $e) {
            return redirect('cabinet')->with('notFound','Страница не найдена');
}


    }
    public function form_word($id,$name){
        $phpWord= new PhpWord();
        $hundreadideas=HudredIdeas::find($id);
        $name_project = $hundreadideas->name_project;
        $name_autors = $hundreadideas->name_autors;
        $relevance = $hundreadideas->relevance;
        $goals_objectives = $hundreadideas->goals_objectives;
        $advantages_project = $hundreadideas->advantages_project;
        $property_protection = $hundreadideas->property_protection;
        $offers = $hundreadideas->offers;
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(14);
    
    
      
        $templateProcessor= new TemplateProcessor('templates\form3.docx');
      
        $templateProcessor->deleteBlock('tableRow');
        $index=0;
        $templateProcessor->setValue('name_project',$name_project);
        $templateProcessor->setValue('name_autors',$name_autors);
        $templateProcessor->setValue('relevance',$relevance);
        $templateProcessor->setValue('goals_objectives',$goals_objectives);
        $templateProcessor->setValue('advantages_project',$advantages_project);
        $templateProcessor->setValue('property_protection',$property_protection);
        $templateProcessor->setValue('offers',$offers);
        $newFileName = $name.'_'.$id;
        $templateProcessor->saveAs($newFileName.'.docx');
        return $newFileName;
    }
    public function form33_update(Request $request,$name,$id){
     
        if($name=="100 ИДЕЙ ДЛЯ БЕЛАРУСИ"){
        $name_project=$request->input('name_project');
        $name_autors=$request->input('name_autors');
        $relevance=$request->input('relevance');
        $goals_objectives=$request->input('goals_objectives');
        $property_protection=$request->input('property_protection');
        $offers=$request->input('offers');
        $advantages_project=$request->input('advantages_project');
            // BarsuNir_dop
          
    
            try {
                $hundredideas = HudredIdeas::findOrFail($id);
               
                $hundredideas->property_protection=$property_protection;
                $hundredideas->offers=$offers;
                $hundredideas->advantages_project=$advantages_project;
                $hundredideas->name_project=$name_project;
                $hundredideas->name_autors=$name_autors;
                $hundredideas->relevance=$relevance;
                $hundredideas->goals_objectives=$goals_objectives;
                $hundredideas->save();
                if(Auth::user()->Role=="Admin"){
                    $user = User::where('name', $hundredideas->owner)->first();
                    $data=$hundredideas->name."_#".$hundredideas->id;
                    $user->notify(new Edit($data));
                }

  
                return redirect('cabinet');
            }
        catch (\Exception $e) {
            return redirect('cabinet')->with('notFound','Заявка не найдена');

    
    }
}
        }
    }


