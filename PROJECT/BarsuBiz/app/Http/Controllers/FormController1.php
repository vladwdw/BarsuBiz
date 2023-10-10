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
    $phpWord->setDefaultFontName('Times New Roman');
    $phpWord->setDefaultFontSize(14);

 
  
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


    // 2. Advanced table

    $section->addTextBreak(1);
    $styleCell =
    array(
    'borderColor' =>'000000',
    'borderSize' => 10,
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

    return response()->download($newFileName.'.docx')->deleteFileAfterSend();
    

    // Теперь вы можете выполнить нужные действия с данными, например, сохранить их в базу данных.

     // Перенаправьте пользователя на другую страницу после успешной обработки формы.
}
}
