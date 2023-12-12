<?php

namespace App\Http\Controllers;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Gpni;
use App\Models\Gpni_calculate;
use App\Models\Gpni_plan;
use App\Models\Gpni_obosn;
use App\Models\GpniDop;
use Illuminate\Http\Request;

class Form4WordController extends Controller
{
    public function form_word($id,$name){
        $phpWord= new PhpWord();
        $gpni=Gpni::find($id);
        $sinceDir= $gpni->sincedir;
        $number= $gpni->number;
        $data= $gpni->data;
        $year= $gpni->year;
        $nameN= $gpni->nameN;
        $nameP= $gpni->nameP;
        $orgZav= $gpni->orgZav;
        $nach= $gpni->nach;
        $end= $gpni->end;
        $allCost= $gpni->allCost;
        $fin1= $gpni->fin1;
        $fin2= $gpni->fin2;
        $fin3= $gpni->fin3;
        $gpnidop=GpniDop::where('project_id', $id)->get();
        $fio=array();
        $uchStep=array();
        $uchZav=array();
        $kafLab=array();
        $phone=array();
        $email=array();
        foreach($gpnidop as $item)
        {
            array_push($fio,$item->fio);
            array_push($uchStep, $item->uchStep);
            array_push($uchZav,$item->uchZav);
            array_push($kafLab,$item->kafLab);
            array_push($phone,$item->phone);
            array_push($email,$item->email);
        }
        $templateProcessor= new TemplateProcessor('templates\form4.docx');


$index=0;
$templateProcessor->setValue('sinceDir',$sinceDir,);
$templateProcessor->setValue('nach',$nach);
$templateProcessor->setValue('number',$number);
$templateProcessor->setValue('data',$data);
$templateProcessor->setValue('year',$year,);
$templateProcessor->setValue('nameN',$nameN);
$templateProcessor->setValue('nameP',$nameP);
$templateProcessor->setValue('orgZav',$orgZav);
$templateProcessor->setValue('end',$end);
$templateProcessor->setValue('allCost',$allCost);
$templateProcessor->setValue('fin1',$fin1);
$templateProcessor->setValue('fin2',$fin2);
$templateProcessor->setValue('fin3',$fin3);
$newFileName = time();


$section=$phpWord->addSection();
$section->addTextBreak(1);
$styleCell =
array(
'borderColor' =>'000000',
'borderSize' => 3,
'valign' => 'center',
'cellMargin' => 100,
);
$styleText = array(
    'name' => 'Times New Roman',
    'valign'=>'center',
    'size' => 12,
);

$table = $section->addTable($styleCell);
for ($i = 0; $i < count($fio); $i++) {
    $section->addTextBreak();
    $table->addRow(200);
$table->addCell(5850, $styleCell)->addText("Ф.И.О. (полное) ",$styleText);
$table->addCell(4400, $styleCell)->addText($fio[$i],$styleText);
$table->addRow(200);
$table->addCell(5850, $styleCell)->addText("Ученая степень ",$styleText);
$table->addCell(4400, $styleCell)->addText($uchStep[$i],$styleText);
$table->addRow(200);
$table->addCell(5850, $styleCell)->addText("Ученое звание ",$styleText);
$table->addCell(4400, $styleCell)->addText($uchZav[$i],$styleText);
$table->addRow(200);
$table->addCell(5850, $styleCell)->addText("Кафедра, лаборатория",$styleText);
$table->addCell(4400, $styleCell)->addText($kafLab[$i],$styleText);
$table->addRow(200);
$table->addCell(5850, $styleCell)->addText("Телефон служебный (с кодом города), мобильный с указанием кода оператора",$styleText);
$table->addCell(4400, $styleCell)->addText($phone[$i],$styleText);
$table->addRow(200);
$table->addCell(5850, $styleCell)->addText("Контактный e-mail",$styleText);
$table->addCell(4400, $styleCell)->addText($email[$i],$styleText);




}
$newFileName = $name.'_'.$id;
$templateProcessor->setComplexBlock('table',$table);
$templateProcessor->saveAs($newFileName.'.docx');
$zip_file = $newFileName.'.zip'; // Name of our archive to download

// Initializing PHP class
$zip = new \ZipArchive();
$zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

$firstfile=$newFileName.'.docx';
$plan=$this->form4_plan_word($id,$name).'.docx';
$calculate=$this->form4_plan_calculate($id,$name).'.docx';
$obosn=$this->form4_obosn_word($id,$name).'.docx';
// Adding file: second parameter is what will the path inside of the archive
// So it will create another folder called "storage/" inside ZIP, and put the file there.
$zip->addFile($firstfile);
$zip->addFile($plan);
$zip->addFile($calculate);
$zip->addFile($obosn);
$zip->close();
unlink(public_path($plan));
unlink(public_path($firstfile));
unlink(public_path($obosn));
unlink(public_path($calculate));
return $zip_file;
    }
    public function form4_plan_word($id, $name)
    {
        $phpWord= new PhpWord();
            $gpni_plan=Gpni_plan::where('project_id', $id)->get();
            
           
            $direction=$gpni_plan->first()->direction;
            $Carryingout=$gpni_plan->first()->Carryingout;
            $nameingeneral=$gpni_plan->first()->nameingeneral;
            $nachPlanneddates=$gpni_plan->first()->nachPlanneddates;
            $endPlanneddates=$gpni_plan->first()->endPlanneddates;
            $totalcost=$gpni_plan->first()->totalcost;
            $results=$gpni_plan->first()->results;
            $name1p=$gpni_plan->first()->name1p;
            $nachPlanneddates1p=$gpni_plan->first()->nachPlanneddates1p;
            $endPlanneddates1p=$gpni_plan->first()->endPlanneddates1p;
            $totalcost1p=$gpni_plan->first()->totalcost1p;
            $results1p=$gpni_plan->first()->results1p;
            $name2p=$gpni_plan->first()->name2p;
            $nachPlanneddates2p=$gpni_plan->first()->nachPlanneddates2p;
            $endPlanneddates2p=$gpni_plan->first()->endPlanneddates2p;
            $totalcost2p=$gpni_plan->first()->totalcost2p;
            $results2p=$gpni_plan->first()->results2p;
            
            $templateProcessor= new TemplateProcessor('templates\form4_plan.docx');
  
  
    $index=0;
    $templateProcessor->setValue('direction',$direction);
    $templateProcessor->setValue('Carryingout',$Carryingout);
    $templateProcessor->setValue('nameingeneral',$nameingeneral);
    $templateProcessor->setValue('nachPlanneddates',$nachPlanneddates);
    $templateProcessor->setValue('endPlanneddates',$endPlanneddates);
    $templateProcessor->setValue('totalcost',$totalcost);
    $templateProcessor->setValue('results',$results);
    $templateProcessor->setValue('name1p',$name1p);
    $templateProcessor->setValue('nachPlanneddates1p',$nachPlanneddates1p);
    $templateProcessor->setValue('endPlanneddates1p',$endPlanneddates1p);
    $templateProcessor->setValue('totalcost1p',$totalcost1p);
    $templateProcessor->setValue('results1p',$results1p);
    $templateProcessor->setValue('name2p',$name2p);
    $templateProcessor->setValue('nachPlanneddates2p',$nachPlanneddates2p);
    $templateProcessor->setValue('endPlanneddates2p',$endPlanneddates2p);
    $templateProcessor->setValue('totalcost2p',$totalcost2p);
    $templateProcessor->setValue('results2p',$results2p);
    $section=$phpWord->addSection();
    $section->addTextBreak(1);
    $styleCell =
    array(
    'borderColor' =>'000000',
    'borderSize' => 3,
    'valign' => 'center',
    'cellMargin' => 100,
    );
    $styleText = array(
        'name' => 'Times New Roman',
        'valign'=>'center',
        'size' => 12,
    );

    

    
    
    $newFileName = $name.'_Календарный план_'.$id;
    $templateProcessor->saveAs($newFileName.'.docx');
    return $newFileName;
    }
    public function form4_obosn_word($id, $name)
    {
        $phpWord= new PhpWord();
            $gpni_obosn=Gpni_obosn::where('project_id', $id)->get();
            $gpni=Gpni::find($id);

            $nameN=$gpni->nameN;
            $nameP=$gpni->nameP;
            $number=$gpni->number;
            $name_nir=$gpni_obosn->first()->name_nir;
            $goals_nir=$gpni_obosn->first()->goals_nir;
            $relevance_nir=$gpni_obosn->first()->relevance_nir;
            $results_nir=$gpni_obosn->first()->results_nir;
            $plan_results_nir=$gpni_obosn->first()->plan_results_nir;
            $volume_nir=$gpni_obosn->first()->volume_nir;
       
           
            
            $templateProcessor= new TemplateProcessor('templates\form4_obosn.docx');
  
  
    $index=0;
    $templateProcessor->setValue('nameN',$nameN);
    $templateProcessor->setValue('nameP',$nameP);
    $templateProcessor->setValue('number',$number);
    $templateProcessor->setValue('name_nir',$name_nir);
    $templateProcessor->setValue('goals_nir',$goals_nir);
    $templateProcessor->setValue('relevance_nir',$relevance_nir);
    $templateProcessor->setValue('results_nir',$results_nir);
    $templateProcessor->setValue('plan_results_nir',$plan_results_nir);
    $templateProcessor->setValue('volume_nir',$volume_nir);

    $section=$phpWord->addSection();
    $section->addTextBreak(1);
    $styleCell =
    array(
    'borderColor' =>'000000',
    'borderSize' => 3,
    'valign' => 'center',
    'cellMargin' => 100,
    );
    $styleText = array(
        'name' => 'Times New Roman',
        'valign'=>'center',
        'size' => 12,
    );

    

    
    
    $newFileName = $name.'_Обоснование_'.$id;
    $templateProcessor->saveAs($newFileName.'.docx');
    return $newFileName;
    }
    public function form4_plan_calculate($id, $name)
    {
        $phpWord= new PhpWord();
            $gpni_calculate=Gpni_calculate::where('project_id', $id)->get();
            $gpni=Gpni::find($id);
            $nameN=$gpni->nameN;
            $nameP=$gpni->nameP;
            $totalCalculate1=$gpni_calculate->first()->totalCalculate1;
            $totalCalculate2=$gpni_calculate->first()->totalCalculate2;
            $totalCalculate3=$gpni_calculate->first()->totalCalculate3;
            $totalCalculate4=$gpni_calculate->first()->totalCalculate4;
            $totalCalculate5=$gpni_calculate->first()->totalCalculate5;
            $totalCalculate6=$gpni_calculate->first()->totalCalculate6;
            $totalCalculate7=$gpni_calculate->first()->totalCalculate7;
            $totalCalculate8=$gpni_calculate->first()->totalCalculate8;
            $firstCalculate1=$gpni_calculate->first()->firstCalculate1;
            $firstCalculate2=$gpni_calculate->first()->firstCalculate2;
            $firstCalculate3=$gpni_calculate->first()->firstCalculate3;
            $firstCalculate4=$gpni_calculate->first()->firstCalculate4;
            $firstCalculate5=$gpni_calculate->first()->firstCalculate5;
            $firstCalculate6=$gpni_calculate->first()->firstCalculate6;
            $firstCalculate7=$gpni_calculate->first()->firstCalculate7;
            $firstCalculate8=$gpni_calculate->first()->firstCalculate8;
            $totalCalculateSum=$gpni_calculate->first()->totalCalculateSum;
            $firstCalculateSum=$gpni_calculate->first()->firstCalculateSum;
            $templateProcessor= new TemplateProcessor('templates\form4_calculate.docx');
  
  
    $index=0;
    $templateProcessor->setValue('nameN',$nameN);
    $templateProcessor->setValue('nameP',$nameP);
    $templateProcessor->setValue('totalCalculate1',$totalCalculate1);
    $templateProcessor->setValue('totalCalculate2',$totalCalculate2);
    $templateProcessor->setValue('totalCalculate3',$totalCalculate3);
    $templateProcessor->setValue('totalCalculate4',$totalCalculate4);
    $templateProcessor->setValue('totalCalculate5',$totalCalculate5);
    $templateProcessor->setValue('totalCalculate6',$totalCalculate6);
    $templateProcessor->setValue('totalCalculate7',$totalCalculate7);
    $templateProcessor->setValue('totalCalculate8',$totalCalculate8);
    $templateProcessor->setValue('firstCalculate1',$firstCalculate1);
    $templateProcessor->setValue('firstCalculate2',$firstCalculate2);
    $templateProcessor->setValue('firstCalculate3',$firstCalculate3);
    $templateProcessor->setValue('firstCalculate4',$firstCalculate4);
    $templateProcessor->setValue('firstCalculate5',$firstCalculate5);
    $templateProcessor->setValue('firstCalculate6',$firstCalculate6);
    $templateProcessor->setValue('firstCalculate7',$firstCalculate7);
    $templateProcessor->setValue('firstCalculate8',$firstCalculate8);
    $templateProcessor->setValue('totalCalculateSum',$totalCalculateSum);
    $templateProcessor->setValue('firstCalculateSum',$firstCalculateSum);
    $section=$phpWord->addSection();
    $section->addTextBreak(1);
    $styleCell =
    array(
    'borderColor' =>'000000',
    'borderSize' => 3,
    'valign' => 'center',
    'cellMargin' => 100,
    );
    $styleText = array(
        'name' => 'Times New Roman',
        'valign'=>'center',
        'size' => 12,
    );

    $newFileName = $name.'_Калькуляция_'.$id;
    $templateProcessor->saveAs($newFileName.'.docx');
    return $newFileName;
    }
}
