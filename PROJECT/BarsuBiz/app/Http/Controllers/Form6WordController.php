<?php

namespace App\Http\Controllers;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Repconc;
use App\Models\RcpiPassCheckboxes;
use App\Models\RcpiStratCheckboxes;
use App\Models\RcpiStrat;
use App\Models\RcpiPass;
use App\Models\RcpiBp;
use App\Models\RcpiTeo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Form6WordController extends Controller
{
    public function form_word($id,$name){
        $phpWord=new PhpWord();
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(14);
        $repconc=Repconc::find($id);
        $templateProcessor= new TemplateProcessor('templates\form6.docx');
        $templateProcessor->setValue('nominationName',$repconc->nominationName);
        $templateProcessor->setValue('nameProject',$repconc->nameProject);
        $templateProcessor->setValue('fio',$repconc->fio);
        $templateProcessor->setValue('teachWorkPlace',$repconc->teachWorkPlace);
        $templateProcessor->setValue('dolzhnUch',$repconc->dolzhnUch);
        $templateProcessor->setValue('uchStep',$repconc->uchStep);
        $templateProcessor->setValue('adress',$repconc->adress);
        $templateProcessor->setValue('phone',$repconc->phone);
        $templateProcessor->setValue('email',$repconc->email);
        $templateProcessor->setValue('projectLink',$repconc->projectLink);
        $templateProcessor->setValue('yurName',$repconc->yurName);
        $templateProcessor->setValue('fioRuk',$repconc->fioRuk);
        $templateProcessor->setValue('dolzhnYur',$repconc->dolzhnYur);
        $templateProcessor->setValue('yurStep',$repconc->yurStep);
        $templateProcessor->setValue('yurAdress',$repconc->yurAdress);
        $templateProcessor->setValue('platNumber',$repconc->platNumber);
        $templateProcessor->setValue('yurPhone',$repconc->yurPhone);
        $templateProcessor->setValue('yurEmail',$repconc->yurEmail);
        $templateProcessor->setValue('fioCommand',$repconc->fioCommand);
        $templateProcessor->setValue('yurLink',$repconc->yurLink);
        $newFileName = $name."_".$id;
       
        $templateProcessor->saveAs($newFileName.'.docx');
        $filePath = public_path($newFileName.'.docx');
        $rcpicheck=RcpiStratCheckboxes::where('project_id',$repconc->id)->get();
        $rcpiInputs=RcpiStrat::where('project_id',$repconc->id)->get();
        $rcpiPassInputs=RcpiPass::where("project_id",$repconc->id)->get();
        $rcpiPassCheck=RcpiPassCheckboxes::where("project_id",$repconc->id)->get();
        $rcpistrat=$this->form6_strategy_word($rcpicheck,$rcpiInputs,$newFileName,$repconc);
        $rcpipass=$this->form6_pass_word($rcpiPassCheck,$rcpiInputs,$newFileName);
        $user=User::where("id",$repconc->user_id)->get();
        $age = Carbon::parse($user->first()->birthdate)->age;
        if($age>30){
        $rcpibp=$this->form6_bp_word($repconc->id,$newFileName);
        }
        else{
            $rcpiteo=$this->form6_teo_word($repconc->id,$newFileName);
        }

        $zip_file = $newFileName.'.zip'; // Name of our archive to download

// Initializing PHP class
$zip = new \ZipArchive();
$zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

$firstfile=$newFileName.'.docx';
// Adding file: second parameter is what will the path inside of the archive
// So it will create another folder called "storage/" inside ZIP, and put the file there.
$zip->addFile($firstfile);
$zip->addFile($rcpistrat.'.docx');
$zip->addFile($rcpipass.'.docx');
$age = Carbon::parse($user->first()->birthdate)->age;
if($user->first()->$age>30){
$zip->addFile($rcpibp.'.docx');
}
else{
    $zip->addFile($rcpiteo.'.docx');
}

$zip->close();
unlink(public_path($firstfile));
unlink(public_path($rcpistrat.'.docx'));
unlink(public_path($rcpipass.'.docx'));
$age = Carbon::parse($user->first()->birthdate)->age;
if($age>30){
unlink(public_path($rcpibp.'.docx'));
}
else{
    unlink(public_path($rcpiteo.'.docx'));
}    
return $zip_file;
    
}

public function form6_teo_word($id,$name){
    $rcpiteo=RcpiTeo::where("project_id",$id);
    $rcpi=Repconc::where("id",$id);
    $templateProcessor= new TemplateProcessor('templates\form6_teo.docx');
    $templateProcessor->setValue('nameProject',$rcpi->first()->nameProject);
    $templateProcessor->setValue('teoPotrProblem',$rcpiteo->first()->teoPotrProblem);
    $templateProcessor->setValue('teoDescripProd',$rcpiteo->first()->teoDescripProd);
    $templateProcessor->setValue('teoBizModel',$rcpiteo->first()->teoBizModel);
    $templateProcessor->setValue('teoRinokInf',$rcpiteo->first()->teoRinokInf);
    $templateProcessor->setValue('teoDescripTechn',$rcpiteo->first()->teoDescripTechn);
    $templateProcessor->setValue('teoConcurent',$rcpiteo->first()->teoConcurent);
    $templateProcessor->setValue('teoIntSobstv',$rcpiteo->first()->teoIntSobstv);
    $templateProcessor->setValue('teoTeamProject',$rcpiteo->first()->teoTeamProject);
    $templateProcessor->setValue('teoMarketing',$rcpiteo->first()->teoMarketing);
    $templateProcessor->setValue('teoFinIndic',$rcpiteo->first()->teoFinIndic);
    $templateProcessor->setValue('teoUnitEconomy',$rcpiteo->first()->teoUnitEconomy);
    $templateProcessor->setValue('teoInvestPerm',$rcpiteo->first()->teoInvestPerm);
    $templateProcessor->setValue('teoRiskProject',$rcpiteo->first()->teoRiskProject);
    $templateProcessor->setValue('teoRelizeTemp',$rcpiteo->first()->teoRelizeTemp);
    $newFileName=$name."_ТЭО";
    $templateProcessor->saveAs($newFileName.'.docx');
    return $newFileName;

}

public function form6_pass_word($checkboxes,$inputs,$name){

    
        $templateProcessor= new TemplateProcessor('templates\form6_pass.docx');
    for($i=0; $i<count($checkboxes); $i++){
        if($checkboxes[$i]->status==1){
        $templateProcessor->setValue("p{$i}",'☑');
        }
        else{
            $templateProcessor->setValue("p{$i}",'☐');
        }
    }
    $templateProcessor->setValue("pasNameProject",$inputs->first()->pasNameProject);
    $templateProcessor->setValue("pasKratkDescrip",$inputs->first()->pasKratkDescrip);
    $templateProcessor->setValue("pasRinokSbita",$inputs->first()->pasRinokSbita);

    $templateProcessor->setValue("pasGeneralPer",$inputs->first()->pasGeneralPer);
    $templateProcessor->setValue("pasRealizationTemp",$inputs->first()->pasRealizationTemp);
    $templateProcessor->setValue("pasObjectComerc",$inputs->first()->pasObjectComerc);
    $templateProcessor->setValue("pasDoztizhProject",$inputs->first()->pasDoztizhProject);
    $templateProcessor->setValue("pasDopInformation",$inputs->first()->pasDopInformation);
    $templateProcessor->setValue("pasDescription",$inputs->first()->pasDescription);
    $templateProcessor->setValue("pasOtherSphere",$inputs->first()->pasOtherSphere);

        $newFileName=$name."_Пасспорт ИП";
        $templateProcessor->saveAs($newFileName.'.docx');
        return $newFileName;

}

public function form6_bp_word($id,$name){
    $phpWord= new PhpWord();
    $rcpi_bp=RcpiBp::where('project_id',$id)->get();
    $templateProcessor= new TemplateProcessor('templates\form6_bp.docx');
    $templateProcessor->setValue("bpFio",$rcpi_bp->first()->bpFio);
    $templateProcessor->setValue("bpSoderzh",$rcpi_bp->first()->bpSoderzh);
    $templateProcessor->setValue("bpResume",$rcpi_bp->first()->bpResume);
    $templateProcessor->setValue("bpProblem",$rcpi_bp->first()->bpProblem);
    $templateProcessor->setValue("bpProduct",$rcpi_bp->first()->bpProduct);
    $templateProcessor->setValue("bpAnalize",$rcpi_bp->first()->bpAnalize);
    $templateProcessor->setValue("bpSobstv",$rcpi_bp->first()->bpSobstv);
    $templateProcessor->setValue("bpPotreb",$rcpi_bp->first()->bpPotreb);
    $templateProcessor->setValue("bpPrice",$rcpi_bp->first()->bpPrice);
    $templateProcessor->setValue("bpConcurents",$rcpi_bp->first()->bpConcurents);
    $templateProcessor->setValue("bpSuppliers",$rcpi_bp->first()->bpSuppliers);
    $templateProcessor->setValue("bpProizPlan",$rcpi_bp->first()->bpProizPlan);
    $templateProcessor->setValue("bpOrgPlan",$rcpi_bp->first()->bpOrgPlan);
    $templateProcessor->setValue("bpRelizeProblems",$rcpi_bp->first()->bpRelizeProblems);
    $templateProcessor->setValue("bpFinPlan",$rcpi_bp->first()->bpFinPlan);
    $templateProcessor->setValue("bpInformation",$rcpi_bp->first()->bpInformation);
    $newFileName=$name."_БизнесПлан";
    $templateProcessor->saveAs($newFileName.'.docx');
    return $newFileName;




}

public function form6_strategy_word($checkboxes,$inputs,$name,$rcpi){
    $templateProcessor= new TemplateProcessor('templates\form6_strategy.docx');
    for($i=0; $i<count($checkboxes);$i++){
        if($checkboxes[$i]->status==1){
        $templateProcessor->setValue("s{$i}",'☑');
        }
        else{
            $templateProcessor->setValue("s{$i}",'☐');
        }
    }
    $templateProcessor->setValue("nameProject",$rcpi->nameProject);
    $templateProcessor->setValue("nominationName",$rcpi->nominationName);
    $templateProcessor->setValue("sFio",$inputs->first()->sFio);
    $templateProcessor->setValue("sOtherSbosob",$inputs->first()->sOtherSbosob);
    $templateProcessor->setValue("sDescriptKomerc",$inputs->first()->sDescriptKomerc);
    $templateProcessor->setValue("sStratComerc",$inputs->first()->sStratComerc);
    $templateProcessor->setValue("currentYear",date("Y"));
    $templateProcessor->setValue("nextYear",date("Y",strtotime('+1 year')));
    $newFileName=$name."_Стратегия";
    $templateProcessor->saveAs($newFileName.'.docx');
    return $newFileName;
}


}
