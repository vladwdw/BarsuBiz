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
    $nirRiks= $request->input('nirRuks');
    $realizationTemp= $request->input('realizationTemp');
    $phone= $request->input('phone');
    $obosnovanie= $request->input('obosnovanie');
    $goalsNir= $request->input('goalsNir');
    $sinceElem= $request->input('sinceElem');
    $number= $request->input('inputValue');
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
    $templateProcessor->setValue('nirRuks',$nirRiks);
    $templateProcessor->setValue('realizationTemp',$realizationTemp);
    $templateProcessor->setValue('phone',$phone);
    $templateProcessor->setValue('obosnovanie',$obosnovanie);
    $templateProcessor->setValue('goalsNir',$goalsNir);
    $templateProcessor->setValue('ozhidResult',$ozhidResult);
    $templateProcessor->setValue('praktZnach',$praktZnach);
    $section=$phpWord->addSection();
    $section->addPageBreak();
$section->addText('Table with colspan and rowspan', "chlen");

$styleTable = ['borderSize' => 6, 'borderColor' => '999999'];
$phpWord->addTableStyle('Colspan Rowspan', $styleTable);
$table = $section->addTable('Colspan Rowspan');

$row = $table->addRow();
$row->addCell(1000, ['vMerge' => 'restart'])->addText('A');
$row->addCell(1000, ['gridSpan' => 2, 'vMerge' => 'restart'])->addText('B');
$row->addCell(1000)->addText('1');

$row = $table->addRow();
$row->addCell(1000, ['vMerge' => 'continue']);
$row->addCell(1000, ['vMerge' => 'continue', 'gridSpan' => 2]);
$row->addCell(1000)->addText('2');

$row = $table->addRow();
$row->addCell(1000, ['vMerge' => 'continue']);
$row->addCell(1000)->addText('C');
$row->addCell(1000)->addText('D');
$row->addCell(1000)->addText('3');

    $newFileName = time();
    $templateProcessor->setComplexBlock('table',$table);
    $templateProcessor->saveAs($newFileName.'.docx');

    return response()->download($newFileName.'.docx')->deleteFileAfterSend();

 }
    
}
