<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Style\Cell;

class FormController1 extends Controller
{
    public function store(Request $request)
{
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
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();
    $table = $section->addTable();
    $table->addRow();
    $table->addCell(1000)->addText('№ п/п');
    $table->addCell(3000)->addText('Показатель, единицы измерения');
    $table->addCell(2000)->addText('Значение показателя');

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


    foreach ($indicator as $indi) {
        
        $table->addRow();
        $table->addCell()->addText($indi);
    }

    $templateProcessor->setComplexBlock("mainTable",$table);
    $newFileName = time();

    
    $templateProcessor->saveAs($newFileName.'.docx');

    return response()->download($newFileName.'.docx')->deleteFileAfterSend();
    

    // Теперь вы можете выполнить нужные действия с данными, например, сохранить их в базу данных.

     // Перенаправьте пользователя на другую страницу после успешной обработки формы.
}
}
