<?php

namespace App\Http\Controllers;

use App\Models\BarsuNir;
use App\Models\BarsuNirDop;
use App\Models\MolInic;
use App\Models\MolIndic;
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

        }
            
    }
    public function  form1_word($molIndic,$molInic)
    {
        $phpWord= new PhpWord();
    
    $phpWord->setDefaultFontName('Times New Roman');
    $phpWord->setDefaultFontSize(14);

 
  
    $templateProcessor= new TemplateProcessor('templates\form1.docx');
  
    $templateProcessor->deleteBlock('tableRow');
    $index=0;
    $templateProcessor->setValue('projectName',$molInic->projectName);

    $templateProcessor->setValue('regionName',$molInic->regionName);
    $templateProcessor->setValue('locality',$molInic->locality);
    $templateProcessor->setValue('description',$molInic->description);
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
    $phpWord = \PhpOffice\PhpWord\IOFactory::load($filePath); 

//Save it
    $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
    $xmlWriter->save('result.pdf');
    return response()->download('result.pdf')->deleteFileAfterSend();
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
        $molInics = MolInic::where('user_id', auth()->id());
        $barsunirs = BarsuNir::where('user_id', auth()->id());

        $items = $molInics->union($barsunirs)->orderBy('created_at', 'desc')->paginate(7);
        return view('cabinet', compact('items'));
    }
    
}
