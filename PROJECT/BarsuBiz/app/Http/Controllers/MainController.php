<?php

namespace App\Http\Controllers;

use App\Models\BarsuNir;
use App\Models\BarsuNirDop;
use App\Models\HudredIdeas;
use App\Models\MolInic;
use App\Models\MolIndic;
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
        return view('forms/form11',compact('molInic','molIndic'));
        }
        if($name=="Участие в НИР"){
            $barsunir=BarsuNir::find($id);
            $barsunirdop=BarsuNirDop::where("project_id", $id)->get();
            return view("forms/form22",compact("barsunir","barsunirdop"));
        }
        if($name== "100 ИДЕЙ ДЛЯ БЕЛАРУСИ"){
            $hundredideas=HudredIdeas::find($id);
            return view("forms/form33",compact("hundredideas"));
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
        else if($name=="Участие в НИР")
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
    if($name=="Так далее"){

    }
    }
    public function form2(){
        return view('forms/form2');
    }
    public function form3(){
        return view('forms/form3');
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
        $molInics = MolInic::select('name', 'created_at','id')->where('user_id', auth()->id());
        $barsunirs = BarsuNir::select('name', 'created_at','id')->where('user_id', auth()->id());
        $hundredideas= HudredIdeas::select('name', 'created_at','id')->where('user_id', auth()->id());
        
        $items = $molInics->union($barsunirs)->union($hundredideas)->orderBy('created_at', 'desc')->paginate(7);

        $items = $molInics->union($barsunirs)->union($hundredideas)->orderBy('created_at', 'desc')->paginate(7);
        return view('cabinet', compact('items'));
    }
    
}
