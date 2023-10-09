<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

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

    $templateProcessor= new TemplateProcessor('templates\form1.docx');
    $templateProcessor->setValue('projectName',$projectName);
    $newFileName = time();
    $templateProcessor->saveAs($newFileName.'.docx');
    return response()->download($newFileName.'.docx')->deleteFileAfterSend();
    

    // Теперь вы можете выполнить нужные действия с данными, например, сохранить их в базу данных.

     // Перенаправьте пользователя на другую страницу после успешной обработки формы.
}
}
