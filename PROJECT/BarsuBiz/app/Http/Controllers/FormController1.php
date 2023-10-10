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


class FormController1 extends Controller
{
    public function store(Request $request)
{
    $phpWord= new PhpWord();
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

 
  
    $templateProcessor= new TemplateProcessor('templates\form1.docx');
  
    $templateProcessor->deleteBlock('tableRow');
    $index=0;
    $templateProcessor->setValue('projectName',$projectName);

    $templateProcessor->setValue('regionName',$regionName);
    $templateProcessor->setValue('locality',$locality);
    $templateProcessor->setValue('description',$description);
    $templateProcessor->setValue('realizationTemp',$realizationTemp);
    $templateProcessor->setValue('fioRuk',$fioRuk);
    $templateProcessor->setValue('phone',$phone);
    $templateProcessor->setValue('email',$email);
    $templateProcessor->setValue('sostav',$sostav);
    $templateProcessor->setValue('dopInformation',$dopInformation);
    $templateProcessor->setValue('indicator',$indicator[0]);
    
    
    $section = $phpWord->addSection();
    $header = array('size' => 16, 'bold' => true);

    // 1. Basic table

    $rows = 10;
    $cols = 5;
    $section->addText('Basic table', $header);

    $table = $section->addTable();
    for ($r = 1; $r <= 8; $r++) {
        $table->addRow();
        for ($c = 1; $c <= 5; $c++) {
            $table->addCell(1750)->addText("Row {$r}, Cell {$c}");
        }
    }

    // 2. Advanced table

    $section->addTextBreak(1);
    $styleCell =
    array(
    'borderColor' =>'000000',
    'borderSize' => 6,
    );

    $table = $section->addTable($styleCell);
    $table->addRow(900);
    $table->addCell(2000, $styleCell)->addText('Row 1');
    $table->addCell(2000, $styleCell)->addText('Row 2');
    $table->addCell(2000, $styleCell)->addText('Row 3');
    $table->addCell(2000, $styleCell)->addText('Row 4');
    $table->addCell(500, $styleCell)->addText('Row 5');
    for ($i = 1; $i <= 8; $i++) {
        $table->addRow();
        $table->addCell(2000)->addText("Cell {$i}");
        $table->addCell(2000)->addText("Cell {$i}");
        $table->addCell(2000)->addText("Cell {$i}");
        $table->addCell(2000)->addText("Cell {$i}");
        $text = (0 == $i % 2) ? 'X' : '';
        $table->addCell(500)->addText($text);}

   

        $templateProcessor->setComplexBlock('mainTable',$table);
    $newFileName = time();

    
    $templateProcessor->saveAs($newFileName.'.docx');

    return response()->download($newFileName.'.docx')->deleteFileAfterSend();
    

    // Теперь вы можете выполнить нужные действия с данными, например, сохранить их в базу данных.

     // Перенаправьте пользователя на другую страницу после успешной обработки формы.
}
}
