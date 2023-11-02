<?php

namespace App\Http\Controllers;
use PhpOffice\PhpWord\Autoloader;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Style\Cell;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style;
use PhpOffice\PhpWord\SimpleType\Jc;
require_once base_path('vendor/autoload.php');


class FormController2 extends Controller
{
 public function store(Request $request){
    $phpWord= new PhpWord();
    $sinceDir= $request->input('sinceDir');
    $workTheme= $request->input('workTheme');
    $nirRuks= $request->input('nirRuks');
    $realizationTemp= $request->input('realizationTemp');
    $phone= $request->input('phone');
    $obosnovanie= $request->input('obosnovanie');
    $goalsNir= $request->input('goalsNir');
    $sinceElem= $request->input('sinceElem');
    $number= $request->input('inputValue');
    $workEtap=$request->input('workEtap');
    $nachSrok= $request->input('nachSrok');
    $endSrok= $request->input('endSrok');
    $kontrResult= $request->input('kontrResult');
    $ozhidResult= $request->input('ozhidResult');
    $praktZnach= $request->input('praktZnach');
    $templateProcessor= new TemplateProcessor('templates\form2.docx');
  
    $templateProcessor->deleteBlock('tableRow');
    $index=0;
    $templateProcessor->setValue('sinceDir',$sinceDir);

    $templateProcessor->setValue('workTheme',$workTheme);
    $templateProcessor->setValue('sinceElem',$sinceElem);
    $templateProcessor->setValue('nirRuks',$nirRuks);
    $templateProcessor->setValue('realizationTemp',$realizationTemp);
    $templateProcessor->setValue('phone',$phone);
    $templateProcessor->setValue('obosnovanie',$obosnovanie);
    $templateProcessor->setValue('goalsNir',$goalsNir);
    $templateProcessor->setValue('ozhidResult',$ozhidResult);
    $templateProcessor->setValue('praktZnach',$praktZnach);
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
    for ($i = 0; $i < count($number); $i++) {

    $table->addRow(200);
    $table->addCell(1090, $styleCell)->addText($number[$i],$styleText);
    $table->addCell(3588, $styleCell)->addText($workEtap[$i],$styleText);
    $table->addCell(1385, $styleCell)->addText($nachSrok[$i],$styleText);
    $table->addCell(1470, $styleCell)->addText($endSrok[$i],$styleText);
    $table->addCell(1900, $styleCell)->addText($kontrResult[$i],$styleText);

    }
   
    $templateProcessor->setComplexBlock('table',$table);
    $templateProcessor->saveAs($newFileName.'.docx');

    return response()->download($newFileName.'.docx')->deleteFileAfterSend();

 }
    
}
