<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Style\Cell;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style;
use PhpOffice\PhpWord\SimpleType\Jc;
class FormController5 extends Controller
{
    public function store(Request $request){
        $scienceDirection=$request->input('sienceDirection');
        $fioGrad=$request->input('fioGrad');
        $currentYear=date("Y");
        $grandCategory=$request->input('grandCategory');
        $workName=$request->input('workName');
        $disertationTheme=$request->input('disertationTheme');
        $uchrName=$request->input('uchrName');
        $special=$request->input('special');
        $knowledge=$request->input('knowledge');
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
        $newFileName = time();

    
        $templateProcessor->saveAs($newFileName.'.docx');
    
        return response()->download($newFileName.'.docx')->deleteFileAfterSend();
    }
}
