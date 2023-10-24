<?php

namespace App\Http\Controllers;
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Style\Cell;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style;
use PhpOffice\PhpWord\SimpleType\Jc;
require_once base_path('vendor/autoload.php');
use Illuminate\Http\Request;

class FormController4 extends Controller
{
    public function store(Request $request)
    {
         $phpWord= new PhpWord();
    $sinceDir= $request->input('sinceDir');
    $namePr= $request->input('namePr');
    $orgZav= $request->input('orgZav');
    $fio= $request->input('fio');
    $uchStep= $request->input('uchStep');
    $uchZav= $request->input('uchZav');
    $kafLab= $request->input('kafLab');
    $phone= $request->input('phone');
    $emaik= $request->input('email');
    $nach=$request->input('nach');
    $end= $request->input('end');
    $allCost= $request->input('allCost');
    $fin1= $request->input('fin1');
    $fin2= $request->input('fin2');
    $fin3= $request->input('fin3');
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

    $table->addRow(200);
    $table->addCell(5000, $styleCell)->addText("Ф.И.О. (полное) ",$styleText);
    $table->addCell(5000, $styleCell)->addText($fio[$i],$styleText);

    }
   
    $templateProcessor->setComplexBlock('table',$table);
    $templateProcessor->saveAs($newFileName.'.docx');

    return response()->download($newFileName.'.docx')->deleteFileAfterSend();
    

   
   
}

}
