<?php

namespace App\Http\Controllers;



use App\Models\Repconc;
use App\Models\BarsuNir;
use App\Models\BarsuNirDop;
use App\Models\HudredIdeas;
use App\Models\MolInic;
use App\Models\MolIndic;
use App\Models\Gpni;
use App\Models\GpniDop;
use App\Models\Grant;
use App\Models\RcpiStratCheckboxes;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\Auth;
use Aneeskhan47\PaginationMerge\Facades\PaginationMerge;
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Style\Cell;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style;
use PhpOffice\PhpWord\SimpleType\Jc;
use Illuminate\Support\Facades\Storage;
use Aspose\Words\WordsApi;
use App\Http\Controllers\Settings;
use App\Http\Controllers\ConvertDocumentRequest;
use App\Models\Gpni_calculate;
use App\Models\Gpni_plan;
use App\Models\RcpiStrat;
use App\Models\User;

require_once base_path('vendor/autoload.php');
class MainController extends Controller
{
    public function form1(){
        return view('forms/form1');
    }
    public function form11($name,$id){

        if($name=="Молодежные инициативы"){
        $molIndic=MolIndic::where('project_id', $id)->get();
        $molInic=MolInic::find($id);
        if($molInic->user_id==Auth::user()->id || Auth::user()->Role=='Admin'){
        return view('forms/form11',compact('molInic','molIndic'));
        }
        else{
            return redirect('cabinet');
        }
    }
        if($name=="Участие в НИР"){
            $barsunir=BarsuNir::find($id);
            $barsunirdop=BarsuNirDop::where("project_id", $id)->get();
            if($barsunir->user_id==Auth::user()->id || Auth::user()->Role=='Admin')
            {
            
                return view("forms/form22",compact("barsunir","barsunirdop"));
        
            }
        else
        {    return redirect('cabinet');}
        
    }
        if($name== "100 ИДЕЙ ДЛЯ БЕЛАРУСИ"){
            $hundredideas=HudredIdeas::find($id);
            if($hundredideas->user_id==Auth::user()->id || Auth::user()->Role=='Admin')
            {
            
                return view("forms/form33",compact("hundredideas"));
        
            }
            else{
                return redirect("cabinet");
            }
        }
        if($name== "ГПНИ"){
            $gpni=Gpni::find($id);
            $gpniDop=GpniDop::where("project_id", $id)->get();
            $gpni_plan=Gpni_plan::where("project_id", $id)->get();
            $gpni_calculate=Gpni_calculate::where("project_id", $id)->get();
            if($gpni->user_id==Auth::user()->id || Auth::user()->Role== "Admin")
            {
            return view("forms/form44",compact("gpni","gpniDop","gpni_plan","gpni_calculate"));
        }
        else{
            return redirect("cabinet");
        }
        }
        if($name== "Заявка на получение гранта"){
            $grant=Grant::find($id);
            if($grant->user_id==Auth::user()->id || Auth::user()->Role== "Admin"){
            return view("forms/form55",compact("grant"));
        }
        
        else{
            return redirect("cabinet");
        }

        }
        if($name== "РКИП"){
            $repconc=Repconc::find($id);
            $repconc_strat_checkbox=RcpiStratCheckboxes::where("project_id", $repconc->id)->get();
            $rcpistrat=RcpiStrat::where("project_id", $repconc->id)->get();
            if($repconc->user_id==Auth::user()->id || Auth::user()->Role== "Admin"){
            return view("forms/form66",compact("repconc","repconc_strat_checkbox","rcpistrat"));
        }
        
        else{
            return redirect("cabinet");
        }

        }


    }
    public function form_word($name,$id)
    {
        if($name=="Молодежные инициативы"){
            $molIndic=MolIndic::where('project_id', $id)->get();
            $molInic=MolInic::find($id);
            //$this->form1_word($molIndic,$molInic);
            $phpWord= new PhpWord();
            $phpWord->setDefaultFontName('Times New Roman');
            $phpWord->setDefaultFontSize(14);
            $templateProcessor= new TemplateProcessor('templates\form1.docx');
            $templateProcessor->deleteBlock('tableRow');
            $index=0;
            $templateProcessor->setValue('projectName',$molInic->nameProject);
            $templateProcessor->setValue('regionName',$molInic->nameRegion);
            $templateProcessor->setValue('locality',$molInic->namePunct);
            $templateProcessor->setValue('description',$molInic->descriptionProblem);
            $templateProcessor->setValue('realizationTemp',$molInic->realizationTemp);
            $templateProcessor->setValue('fioRuk',$molInic->fioRuk);
            $templateProcessor->setValue('phone',$molInic->phone);
            $templateProcessor->setValue('email',$molInic->email);
            $templateProcessor->setValue('sostav',$molInic->sostav);
            $templateProcessor->setValue('dopInformation',$molInic->dopInformation);
            $indicator = array();
            foreach($molIndic as $mol)
            {
                array_push($indicator,$mol->indicator);
            }
            $valueIndicator = array();
            foreach($molIndic as $mol)
            {
                array_push($valueIndicator,$mol->value);
            }
            
            
            $templateProcessor->setValue('indicator',$indicator[0]);
            
            
            $section = $phpWord->addSection();
            $header = array('size' => 16, 'bold' => true);
        
        
            // 2. Advanced table
        
            $section->addTextBreak(1);
            $styleCell =
            array(
            'borderColor' =>'000000',
            'borderSize' => 5,
            'valign' => 'center',
            );
            $styleText = array(
                'name' => 'Times New Roman',
                'size' => 14, // Размер шрифта в точках
            );
        
            $table = $section->addTable($styleCell);
            $table->addRow(900);
            $table->addCell(800, $styleCell)->addText('№ п/п',$styleText);
            $table->addCell(4800, $styleCell)->addText('Показатель, единиц измерения',$styleText);
            $table->addCell(4000, $styleCell)->addText('Значение показателя',$styleText);
            for ($i = 0; $i < count($indicator); $i++) {
                $table->addRow();
                $table->addCell(800)->addText($i+1,$styleText);
                $table->addCell(4800)->addText($indicator[$i],$styleText);      
                $table->addCell(4000)->addText($valueIndicator[$i],$styleText);
            };
            
           
        
                $templateProcessor->setComplexBlock('mainTable',$table);
            $newFileName = $name."_".$id;
           
            $templateProcessor->saveAs($newFileName.'.docx');
            $filePath = public_path($newFileName.'.docx');
            return response()->download($filePath)->deleteFileAfterSend();
        }
        if($name=="РКИП"){
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
            return response()->download($filePath)->deleteFileAfterSend();

        }
        if($name=="Участие в НИР")
        {
            $phpWord= new PhpWord();
    
            $phpWord->setDefaultFontName('Times New Roman');
            $phpWord->setDefaultFontSize(14);
            $barsunirdop=BarsuNirDop::where('project_id', $id)->get();
            $barsunir= BarsuNir::find($id);
            $templateProcessor= new TemplateProcessor('templates\form2.docx');
      
            $templateProcessor->deleteBlock('tableRow');
            $index=0;
            $templateProcessor->setValue('sinceDir',$barsunir->sinceDir);
        
            $templateProcessor->setValue('workTheme',$barsunir->workTheme);
            $templateProcessor->setValue('sinceElem',$barsunir->sinceElem);
            $templateProcessor->setValue('nirRuks',$barsunir->nirRuks);
            $templateProcessor->setValue('realizationTemp',$barsunir->realizationTemp);
            $templateProcessor->setValue('phone',$barsunir->phone);
            $templateProcessor->setValue('obosnovanie',$barsunir->obosnovanie);
            $templateProcessor->setValue('goalsNir',$barsunir->goalsNir);
            $templateProcessor->setValue('ozhidResult',$barsunir->ozhidResult);
            $templateProcessor->setValue('praktZnach',$barsunir->praktZnach);
            $section=$phpWord->addSection();
        
    
        $newFileName = time();
        $section->addTextBreak(1);
        $styleCell =
        array(
        'borderColor' =>'000000',
        'borderSize' => 3,
        'valign' => 'center',
        );
        $styleText = array(
            'name' => 'Times New Roman',
            'valign'=>'center',
            'size' => 14,
        );
    
    
        $workEtap=array();
        $nachSrok=array();
        $endSrok=array();
        $kontrResult=array();
        foreach($barsunirdop as $item)
        {
            array_push($workEtap,$item->workEtap);
            array_push($nachSrok,$item->nachSrok);
            array_push($endSrok,$item->endSrok);
            array_push($kontrResult,$item->kontrResult);
        }
    
        $table = $section->addTable($styleCell);
        for ($i = 0; $i < count($workEtap); $i++) {
        $table->addRow(200);
        $table->addCell(1090, $styleCell)->addText($i,$styleText);
        $table->addCell(3588, $styleCell)->addText($workEtap[$i],$styleText);
        $table->addCell(1385, $styleCell)->addText($nachSrok[$i],$styleText);
        $table->addCell(1470, $styleCell)->addText($endSrok[$i],$styleText);
        $table->addCell(1900, $styleCell)->addText($kontrResult[$i],$styleText);
    
        }
       $filename=$name."_".$id;
        $templateProcessor->setComplexBlock('table',$table);
        $templateProcessor->saveAs($filename.'.docx');
        $filePath = public_path($filename.'.docx');
        return response()->download($filePath)->deleteFileAfterSend();

        }
        if($name=="100 ИДЕЙ ДЛЯ БЕЛАРУСИ"){
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
            
    return response()->download($newFileName.'.docx')->deleteFileAfterSend();
        }
        if($name=="ГПНИ"){
            $phpWord= new PhpWord();
            $gpni=Gpni::find($id);
            $sinceDir= $gpni->sincedir;
            $namePr= $gpni->namePr;
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
    $templateProcessor->setValue('sinceDir',$sinceDir);
    $templateProcessor->setValue('nach',$nach);
    $templateProcessor->setValue('namePr',$namePr);
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

    return response()->download($newFileName.'.docx')->deleteFileAfterSend();
    


        }
        if($name=="Заявка на получение гранта"){
            $grant=Grant::find($id);
            $scienceDirection=$grant->sienceDirection;
            $fioGrad=$grant->fioGrad;
            $currentYear=date("Y");
            $grandCategory=$grant->grandCategory;
            $workName=$grant->workName;
            $disertationTheme=$grant->disertationTheme;
            $uchrName=$grant->uchrName;
            $special=$grant->special;
            $knowledge=$grant->knowledge;
            $templateProcessor= new TemplateProcessor('templates\form5.docx');
            $templateProcessor->setValue('scienceDirection',$scienceDirection);
            $templateProcessor->setValue('fioGrad',$fioGrad);
            $templateProcessor->setValue('grandCategory',$grandCategory);
            $templateProcessor->setValue('workName',$workName);
            $templateProcessor->setValue('disertationTheme',$disertationTheme);
            $templateProcessor->setValue('uchrName',$uchrName);
            $templateProcessor->setValue('special',$special);
            $templateProcessor->setValue('knowledge',$knowledge);
            $templateProcessor->setValue('currentYear',$currentYear);
            $newFileName = $name.'_'.$id;
            $templateProcessor->saveAs($newFileName.'.docx');
            
    return response()->download($newFileName.'.docx')->deleteFileAfterSend();
        }
            
    }
    public function  form_pdf($name,$id)
    {
        if($name== "Молодежные инициативы"){
        $phpWord= new PhpWord();
    
    $phpWord->setDefaultFontName('Times New Roman');
    $phpWord->setDefaultFontSize(14);
    $molIndic=MolIndic::where('project_id', $id)->get();
    $molInic=MolInic::find($id);
 
  
    $templateProcessor= new TemplateProcessor('templates\form1.docx');
  
    $templateProcessor->deleteBlock('tableRow');
    $index=0;
    $templateProcessor->setValue('projectName',$molInic->nameProject);
    $templateProcessor->setValue('regionName',$molInic->nameRegion);
    $templateProcessor->setValue('locality',$molInic->namePunct);
    $templateProcessor->setValue('description',$molInic->descriptionProblem);
    $templateProcessor->setValue('realizationTemp',$molInic->realizationTemp);
    $templateProcessor->setValue('fioRuk',$molInic->fioRuk);
    $templateProcessor->setValue('phone',$molInic->phone);
    $templateProcessor->setValue('email',$molInic->email);
    $templateProcessor->setValue('sostav',$molInic->sostav);
    $templateProcessor->setValue('dopInformation',$molInic->dopInformation);
    $indicator = array();
    foreach($molIndic as $mol)
    {
        array_push($indicator,$mol->indicator);
    }
    $valueIndicator = array();
    foreach($molIndic as $mol)
    {
        array_push($valueIndicator,$mol->value);
    }
    
    
    $templateProcessor->setValue('indicator',$indicator[0]);
    
    
    $section = $phpWord->addSection();
    $header = array('size' => 16, 'bold' => true);


    // 2. Advanced table

    $section->addTextBreak(1);
    $styleCell =
    array(
    'borderColor' =>'000000',
    'borderSize' => 5,
    'valign' => 'center',
    );
    $styleText = array(
        'name' => 'Times New Roman',
        'size' => 14, // Размер шрифта в точках
    );

    $table = $section->addTable($styleCell);
    $table->addRow(900);
    $table->addCell(800, $styleCell)->addText('№ п/п',$styleText);
    $table->addCell(4800, $styleCell)->addText('Показатель, единиц измерения',$styleText);
    $table->addCell(4000, $styleCell)->addText('Значение показателя',$styleText);
    for ($i = 0; $i < count($indicator); $i++) {
        $table->addRow();
        $table->addCell(800)->addText($i+1,$styleText);
        $table->addCell(4800)->addText($indicator[$i],$styleText);      
        $table->addCell(4000)->addText($valueIndicator[$i],$styleText);
    };
    
   

        $templateProcessor->setComplexBlock('mainTable',$table);
    $newFileName = time();
   
    $templateProcessor->saveAs($newFileName.'.docx');
    
    $filePath = public_path($newFileName.'.docx');
    
    $word1 = IOFactory::load($newFileName.'.docx', 'Word2007');

   
    
    
    // Конвертируем документ в формат PDF
    $dompdf = base_path('vendor/dompdf/dompdf');
    \PhpOffice\PhpWord\Settings::setPdfRendererPath($dompdf);
    \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
    $pdfwriter=\PhpOffice\PhpWord\IOFactory::createWriter($word1,'PDF');
    $fontDir = base_path('fonts');
    $options = new \Dompdf\Options();
    $options->set('fontDir', $fontDir);
    $pdfwriter->save(public_path($newFileName));
    header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $newFileName.'.pdf');
readfile(public_path($newFileName));
unlink(public_path($newFileName));
unlink($filePath);
    // Отправляем файл на скачивание


   }
   if($name="РКИП"){
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
    $word1 = IOFactory::load($newFileName.'.docx', 'Word2007');

   
    
    
    // Конвертируем документ в формат PDF
    $dompdf = base_path('vendor/dompdf/dompdf');
    \PhpOffice\PhpWord\Settings::setPdfRendererPath($dompdf);
    \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
    $pdfwriter=\PhpOffice\PhpWord\IOFactory::createWriter($word1,'PDF');
    $fontDir = base_path('fonts');
    $options = new \Dompdf\Options();
    $options->set('fontDir', $fontDir);
    $pdfwriter->save(public_path($newFileName));
    header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $newFileName.'.pdf');
readfile(public_path($newFileName));
unlink(public_path($newFileName));
unlink($filePath);
  

}
    if ($name=="Участие в НИР"){
        $phpWord= new PhpWord();
    
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(14);
        $barsunirdop=BarsuNirDop::where('project_id', $id)->get();
        $barsunir= BarsuNir::find($id);
        $templateProcessor= new TemplateProcessor('templates\form2.docx');
  
        $templateProcessor->deleteBlock('tableRow');
        $index=0;
        $templateProcessor->setValue('sinceDir',$barsunir->sinceDir);
    
        $templateProcessor->setValue('workTheme',$barsunir->workTheme);
        $templateProcessor->setValue('sinceElem',$barsunir->sinceElem);
        $templateProcessor->setValue('nirRuks',$barsunir->nirRuks);
        $templateProcessor->setValue('realizationTemp',$barsunir->realizationTemp);
        $templateProcessor->setValue('phone',$barsunir->phone);
        $templateProcessor->setValue('obosnovanie',$barsunir->obosnovanie);
        $templateProcessor->setValue('goalsNir',$barsunir->goalsNir);
        $templateProcessor->setValue('ozhidResult',$barsunir->ozhidResult);
        $templateProcessor->setValue('praktZnach',$barsunir->praktZnach);
        $section=$phpWord->addSection();
    

    $newFileName = time();
    $section->addTextBreak(1);
    $styleCell =
    array(
    'borderColor' =>'000000',
    'borderSize' => 3,
    'valign' => 'center',
    );
    $styleText = array(
        'name' => 'Times New Roman',
        'valign'=>'center',
        'size' => 14,
    );

    $table = $section->addTable($styleCell);
    $workEtap=array();
    $nachSrok=array();
    $endSrok=array();
    $kontrResult=array();
    foreach($barsunirdop as $item)
    {
        array_push($workEtap,$item->workEtap);
        array_push($nachSrok,$item->nachSrok);
        array_push($endSrok,$item->endSrok);
        array_push($kontrResult,$item->kontrResult);
    }

    
    for ($i = 0; $i < count($workEtap); $i++) {

    $table->addRow(200);
    $table->addCell(1090, $styleCell)->addText($i,$styleText);
    $table->addCell(3588, $styleCell)->addText($workEtap[$i],$styleText);
    $table->addCell(1385, $styleCell)->addText($nachSrok[$i],$styleText);
    $table->addCell(1470, $styleCell)->addText($endSrok[$i],$styleText);
    $table->addCell(1900, $styleCell)->addText($kontrResult[$i],$styleText);

    }
   
    $templateProcessor->setComplexBlock('table',$table);
    $templateProcessor->setComplexBlock('table',$table);
    $templateProcessor->saveAs($newFileName.'.docx');
    
    $filePath = public_path($newFileName.'.docx');
    
    $word1 = IOFactory::load($newFileName.'.docx', 'Word2007');

   
    
    
    // Конвертируем документ в формат PDF
    $dompdf = base_path('vendor/dompdf/dompdf');
    \PhpOffice\PhpWord\Settings::setPdfRendererPath($dompdf);
    \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
    $pdfwriter=\PhpOffice\PhpWord\IOFactory::createWriter($word1,'PDF');
    $fontDir = base_path('fonts');
    $options = new \Dompdf\Options();
    $options->set('fontDir', $fontDir);
    $pdfwriter->save(public_path($newFileName));
    header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $newFileName.'.pdf');
readfile(public_path($newFileName));
unlink(public_path($newFileName));
unlink($filePath);

    }


    if($name=="100 ИДЕЙ ДЛЯ БЕЛАРУСИ"){
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
        
    $filePath = public_path($newFileName.'.docx');
    
    $word1 = IOFactory::load($newFileName.'.docx', 'Word2007');

   
    
    
    // Конвертируем документ в формат PDF
    $dompdf = base_path('vendor/dompdf/dompdf');
    \PhpOffice\PhpWord\Settings::setPdfRendererPath($dompdf);
    \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
    $pdfwriter=\PhpOffice\PhpWord\IOFactory::createWriter($word1,'PDF');
    $fontDir = base_path('fonts');
    $options = new \Dompdf\Options();
    $options->set('fontDir', $fontDir);
    $pdfwriter->save(public_path($newFileName));
    header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $newFileName.'.pdf');
readfile(public_path($newFileName));
unlink(public_path($newFileName));
unlink($filePath);

    }
    if($name=="ГПНИ"){
        $phpWord= new PhpWord();
        $gpni=Gpni::find($id);
        $sinceDir= $gpni->sincedir;
        $namePr= $gpni->namePr;
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
$templateProcessor->setValue('sinceDir',$sinceDir);
$templateProcessor->setValue('nach',$nach);
$templateProcessor->setValue('namePr',$namePr);
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
$filePath = public_path($newFileName.'.docx');
    
    $word1 = IOFactory::load($newFileName.'.docx', 'Word2007');

   
    
    
    // Конвертируем документ в формат PDF
    $dompdf = base_path('vendor/dompdf/dompdf');
    \PhpOffice\PhpWord\Settings::setPdfRendererPath($dompdf);
    \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
    $pdfwriter=\PhpOffice\PhpWord\IOFactory::createWriter($word1,'PDF');
    $fontDir = base_path('fonts');
    $options = new \Dompdf\Options();
    $options->set('fontDir', $fontDir);
    $pdfwriter->save(public_path($newFileName));
    header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $newFileName.'.pdf');
readfile(public_path($newFileName));
unlink(public_path($newFileName));
unlink($filePath);


    }
    if($name=="Заявка на получение гранта"){
        $grant=Grant::find($id);
        $scienceDirection=$grant->sienceDirection;
        $fioGrad=$grant->fioGrad;
        $currentYear=date("Y");
        $grandCategory=$grant->grandCategory;
        $workName=$grant->workName;
        $disertationTheme=$grant->disertationTheme;
        $uchrName=$grant->uchrName;
        $special=$grant->special;
        $knowledge=$grant->knowledge;
        $templateProcessor= new TemplateProcessor('templates\form5.docx');
        $templateProcessor->setValue('scienceDirection',$scienceDirection);
        $templateProcessor->setValue('fioGrad',$fioGrad);
        $templateProcessor->setValue('grandCategory',$grandCategory);
        $templateProcessor->setValue('workName',$workName);
        $templateProcessor->setValue('disertationTheme',$disertationTheme);
        $templateProcessor->setValue('uchrName',$uchrName);
        $templateProcessor->setValue('special',$special);
        $templateProcessor->setValue('knowledge',$knowledge);
        $templateProcessor->setValue('currentYear',$currentYear);
        $newFileName = $name.'_'.$id;
        $templateProcessor->saveAs($newFileName.'.docx');
        $filePath = public_path($newFileName.'.docx');
    
    $word1 = IOFactory::load($newFileName.'.docx', 'Word2007');

   
    
    
    // Конвертируем документ в формат PDF
    $dompdf = base_path('vendor/dompdf/dompdf');
    \PhpOffice\PhpWord\Settings::setPdfRendererPath($dompdf);
    \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
    $pdfwriter=\PhpOffice\PhpWord\IOFactory::createWriter($word1,'PDF');
    $fontDir = base_path('fonts');
    $options = new \Dompdf\Options();
    $options->set('fontDir', $fontDir);
    $pdfwriter->save(public_path($newFileName));
    header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $newFileName.'.pdf');
readfile(public_path($newFileName));
unlink(public_path($newFileName));
unlink($filePath);
    }

    }
    public function back(){
        return redirect('/cabinet');
    }
    public function form2(){
        return view('forms/form2');
    }
    public function form3(){
        return view('forms/form3');
    }
    public function form6(){
        return view('forms/form6');
    }
    public function form4(){
        return view('forms/form4');
    }
    public function form5(){
        return view('forms/form5');
    }
    public function login(){
        return view('forms/login');
    }
    public function registerPage(){
        return view('register');
    }
    public function cabinet(){

        if(Auth::user()->Role=='User'){
        $molInics = MolInic::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
        $repconc = Repconc::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
        $barsunirs = BarsuNir::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
        $hundredideas= HudredIdeas::select('name', 'created_at','id','owner')->where('user_id', auth()->id());
        $gpnis=Gpni::select('name','created_at','id','owner')->where('user_id', auth()->id());
        $grant=Grant::select('name','created_at','id','owner')->where('user_id', auth()->id());
        $items = $molInics->union($barsunirs)->union($hundredideas)->union($gpnis)->orderBy('created_at', 'desc')->union($grant)->union($repconc)->orderBy('created_at', 'desc')->paginate(7);
        $notifications = auth()->user()->unreadNotifications;
        return view('cabinet', compact('items'), ['notifications' => $notifications]);
      
       
        }
        
        if(Auth::user()->Role=='Admin'){
            $molInics = MolInic::select('name', 'created_at','id','owner');
            $repconc = Repconc::select('name', 'created_at','id','owner');
            $barsunirs = BarsuNir::select('name', 'created_at','id','owner');
            $hundredideas= HudredIdeas::select('name', 'created_at','id','owner');
            $gpnis=Gpni::select('name','created_at','id','owner');
            $grant=Grant::select('name','created_at','id','owner');
            $items = $molInics->union($barsunirs)->union($hundredideas)->union($gpnis)->orderBy('created_at', 'desc')->union($grant)->union($repconc)->paginate(7);
            return view('cabinet', compact('items'));
           
            }
            
            

    }
    
}
