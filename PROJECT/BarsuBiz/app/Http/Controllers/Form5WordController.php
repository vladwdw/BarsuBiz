<?php

namespace App\Http\Controllers;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Grant;
use App\Models\grant_calculate;
use App\Models\grant_obosn;
use Illuminate\Http\Request;

class Form5WordController extends Controller
{
    public function form_word($id,$name){
        $grant=Grant::find($id);
        $scienceDirection=$grant->sienceDirection;
        $fioGrad=$grant->fioGrad;
        $currentYear=date("Y");
        $grandCategory=$grant->grandCategory;
        $workName=$grant->workName;
        $disertationTheme=$grant->disertationTheme;
        $uchrName=$grant->uchrName;
        $special=$grant->special;
        $knowledge=$grant->knowledge;
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
        $newFileName = $name.'_'.$id;
        $templateProcessor->saveAs($newFileName.'.docx');
        
        $zip_file = $newFileName.'.zip'; // Name of our archive to download

        // Initializing PHP class
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        
        $firstfile=$newFileName.'.docx';
        $calculate=$this->form5_calculate_word($id,$name).'.docx';
        $obosn=$this->form5_obosn_word($id,$name).'.docx';
        // Adding file: second parameter is what will the path inside of the archive
        // So it will create another folder called "storage/" inside ZIP, and put the file there.
        $zip->addFile($firstfile);
   
        $zip->addFile($calculate);
        $zip->addFile($obosn);
        $zip->close();
     
        unlink(public_path($firstfile));
        unlink(public_path($obosn));
        unlink(public_path($calculate));
      return $zip_file;
    }
    public function form5_obosn_word($id, $name)
    {
        $phpWord= new PhpWord();
            $grant_obosn=grant_obosn::where('project_id', $id)->get();
            $grant=Grant::find($id);
            $name_nir=$grant->workName;
            $goal=$grant_obosn->first()->goal;
            $idea=$grant_obosn->first()->idea;
            $struct=$grant_obosn->first()->struct;
            $state=$grant_obosn->first()->state;
            $rezults=$grant_obosn->first()->rezults;
            $field=$grant_obosn->first()->field;
            $info=$grant_obosn->first()->info;
            $templateProcessor= new TemplateProcessor('templates\form5_obosn.docx');
  
  
    $index=0;
    $templateProcessor->setValue('name_nir',$name_nir);
    $templateProcessor->setValue('goal',$goal);
    $templateProcessor->setValue('idea',$idea);
    $templateProcessor->setValue('struct',$struct);
    $templateProcessor->setValue('state',$state);
    $templateProcessor->setValue('rezults',$rezults);
    $templateProcessor->setValue('field',$field);
    $templateProcessor->setValue('info',$info);
    
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

    

    
    
    $newFileName = $name.'_Обоснование_'.$id;
    $templateProcessor->saveAs($newFileName.'.docx');
    return $newFileName;
    }
    public function form5_calculate_word($id, $name)
    {
        $phpWord= new PhpWord();
            $grant_calculate=grant_calculate::where('project_id', $id)->get();
            $grant=Grant::find($id);
            $name_nir=$grant->workName;
            $pay=$grant_calculate->first()->pay;
            $materials=$grant_calculate->first()->materials;
            $accruals=$grant_calculate->first()->accruals;
            $business=$grant_calculate->first()->business;
            $invoices=$grant_calculate->first()->invoices;
            $costs=$grant_calculate->first()->costs;
            $sum=$grant_calculate->first()->sum;
            $templateProcessor= new TemplateProcessor('templates\form5_calculate.docx');
  
  
    $index=0;
    $templateProcessor->setValue('name_nir',$name_nir);
    $templateProcessor->setValue('pay',$pay);
    $templateProcessor->setValue('materials',$materials);
    $templateProcessor->setValue('accruals',$accruals);
    $templateProcessor->setValue('business',$business);
    $templateProcessor->setValue('invoices',$invoices);
    $templateProcessor->setValue('costs',$costs);
    $templateProcessor->setValue('sum',$sum);
    
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

    

    
    
    $newFileName = $name.'_Калькуляция_'.$id;
    $templateProcessor->saveAs($newFileName.'.docx');
    return $newFileName;
    }
}
