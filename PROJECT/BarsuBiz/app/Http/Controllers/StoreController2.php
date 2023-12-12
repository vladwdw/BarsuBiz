<?php

namespace App\Http\Controllers;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Auth;
use App\Models\BarsuNir;
use App\Models\BarsuNirDop;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\Edit;
class StoreController2 extends Controller
{
    public function store(Request $request){
       // BarsuNir
        $sinceDir = $request->input('sinceDir');
        $workTheme = $request->input('workTheme');
        $nirRuks = $request->input('nirRuks');
        $realizationTemp = $request->input('realizationTemp');
        $phone = $request->input('phone');
        $obosnovanie = $request->input('obosnovanie');
        $sinceElem = $request->input('sinceElem');
        $ozhidResult = $request->input('ozhidResult');
        $praktZnach = $request->input('praktZnach');
        $goalsNir=$request->input('goalsNir');
        // BarsuNir_dop
        $workEtap = $request->input('workEtap');
        $nachSrok = $request->input('nachSrok');
        $endSrok = $request->input('endSrok');
        $kontrResult = $request->input('kontrResult');
        try {
            $barsunir = new BarsuNir();
            $barsunir->user_id=Auth::user()->id;
            $barsunir->owner=Auth::user()->name;
            $barsunir->sinceDir=$sinceDir;
            $barsunir->workTheme=$workTheme;
            $barsunir->nirRuks=$nirRuks;
            $barsunir->realizationTemp=$realizationTemp;
            $barsunir->phone=$phone;
            $barsunir->obosnovanie=$obosnovanie;
            $barsunir->sinceElem=$sinceElem;
            $barsunir->ozhidResult=$ozhidResult;
            $barsunir->praktZnach=$praktZnach;
            $barsunir->goalsNir=$goalsNir;
            $barsunir->save();
            for($i=0; $i<count($workEtap); $i++){
            $BarsuNirDop=new BarsuNirDop();
            $BarsuNirDop->project_id=$barsunir->id;
            $BarsuNirDop->workEtap= $workEtap[$i];
            $BarsuNirDop->nachSrok= $nachSrok[$i];
            $BarsuNirDop->endSrok= $endSrok[$i];
            $BarsuNirDop->kontrResult=$kontrResult[$i];
            $BarsuNirDop->save();
           
            }

             return redirect('/cabinet');
 

        } catch (\Exception $e) {
                     dd($e->getMessage());
        }

    }
    public function form_word($id,$name){
        $phpWord= new PhpWord();
    
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(14);
        $barsunirdop=BarsuNirDop::where('project_id', $id)->get();
        $barsunir= BarsuNir::find($id);
        $templateProcessor= new TemplateProcessor('templates\form2.docx');
  
        $templateProcessor->deleteBlock('tableRow');
        $index=0;
        $templateProcessor->setValue('sinceDir',$barsunir->sinceDir);
    
        $templateProcessor->setValue('workTheme',$barsunir->workTheme);
        $templateProcessor->setValue('sinceElem',$barsunir->sinceElem);
        $templateProcessor->setValue('nirRuks',$barsunir->nirRuks);
        $templateProcessor->setValue('realizationTemp',$barsunir->realizationTemp);
        $templateProcessor->setValue('phone',$barsunir->phone);
        $templateProcessor->setValue('obosnovanie',$barsunir->obosnovanie);
        $templateProcessor->setValue('goalsNir',$barsunir->goalsNir);
        $templateProcessor->setValue('ozhidResult',$barsunir->ozhidResult);
        $templateProcessor->setValue('praktZnach',$barsunir->praktZnach);
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


    $workEtap=array();
    $nachSrok=array();
    $endSrok=array();
    $kontrResult=array();
    foreach($barsunirdop as $item)
    {
        array_push($workEtap,$item->workEtap);
        array_push($nachSrok,$item->nachSrok);
        array_push($endSrok,$item->endSrok);
        array_push($kontrResult,$item->kontrResult);
    }

    $table = $section->addTable($styleCell);
    for ($i = 0; $i < count($workEtap); $i++) {
    $table->addRow(200);
    $table->addCell(1090, $styleCell)->addText($i+1,$styleText);
    $table->addCell(3588, $styleCell)->addText($workEtap[$i],$styleText);
    $table->addCell(1385, $styleCell)->addText($nachSrok[$i],$styleText);
    $table->addCell(1470, $styleCell)->addText($endSrok[$i],$styleText);
    $table->addCell(1900, $styleCell)->addText($kontrResult[$i],$styleText);

    }
   $filename=$name."_".$id;
    $templateProcessor->setComplexBlock('table',$table);
    $templateProcessor->saveAs($filename.'.docx');
    $filePath = public_path($filename.'.docx');
    return $filePath;
    }
    public function form22_update(Request $request,$name,$id){
       
        if($name=="Участие в НИР"){
            $sinceDir = $request->input('sinceDir');
            $workTheme = $request->input('workTheme');
            $nirRuks = $request->input('nirRuks');
            $realizationTemp = $request->input('realizationTemp');
            $phone = $request->input('phone');
            $obosnovanie = $request->input('obosnovanie');
            $sinceElem = $request->input('sinceElem');
            $ozhidResult = $request->input('ozhidResult');
            $praktZnach = $request->input('praktZnach');
            $goalsNir=$request->input('goalsNir');
            // BarsuNir_dop
            $workEtap = $request->input('workEtap');
            $nachSrok = $request->input('nachSrok');
            $endSrok = $request->input('endSrok');
            $kontrResult = $request->input('kontrResult');
    
          
               
                try{
                    $barsunir = BarsuNir::findOrFail($id);
                $barsunir->sinceDir=$sinceDir;
                $barsunir->workTheme=$workTheme;
                $barsunir->nirRuks=$nirRuks;
                $barsunir->realizationTemp=$realizationTemp;
                $barsunir->phone=$phone;
                $barsunir->obosnovanie=$obosnovanie;
                $barsunir->sinceElem=$sinceElem;
                $barsunir->ozhidResult=$ozhidResult;
                $barsunir->praktZnach=$praktZnach;
                $barsunir->goalsNir=$goalsNir;
                $barsunir->save();
                $BarsuNirDop=BarsuNirDop::where('project_id', $id)->delete();
                for($i=0; $i<count($workEtap); $i++){
                $BarsuNirDop=new BarsuNirDop();
                $BarsuNirDop->project_id=$barsunir->id;
                $BarsuNirDop->workEtap= $workEtap[$i];
                $BarsuNirDop->nachSrok= $nachSrok[$i];
                $BarsuNirDop->endSrok= $endSrok[$i];
                $BarsuNirDop->kontrResult=$kontrResult[$i];
                $BarsuNirDop->save();
               
                }
                if(Auth::user()->Role=="Admin"){
                    $user = User::where('name', $barsunir->owner)->first();
                    $data=$barsunir->name."_#".$barsunir->id;
                    $user->notify(new Edit($data));
                }
                return redirect('cabinet');
            }
            catch (\Exception $e) {
                return redirect('cabinet')->with('notFound','Заявка не найдена');
            }
    
            } 
    
    }


public function form22_delete($name,$id)
{
    if($name=="Молодежные инициативы"){
  $barsunirdop=BarsuNirDop::where('project_id', $id)->delete();
 $barsunir= BarsuNir::find($id)->delete();
    return redirect('\cabinet');
    }
    
}
}
