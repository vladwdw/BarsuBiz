<?php

namespace App\Http\Controllers;
use App\Models\RcpiPassCheckboxes;
use App\Models\Repconc;
use App\Notifications\Edit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RcpiStratCheckboxes;
use App\Models\RcpiStrat;
class StoreController6 extends Controller
{
    public function store(Request $request){
        try{
        $nominationName=$request->input('nominationName');
        $nameProject=$request->input('nameProject');
        $fio=$request->input('fio');
        $teachWorkPlace=$request->input('teachWorkPlace');
        $dolzhnUch=$request->input('dolzhnUch');
        $uchStep=$request->input('uchStep');
        $adress=$request->input('adress');
        $phone=$request->input('phone');
        $email=$request->input('email');
        $projectLink=$request->input('projectLink');
        $yurName=$request->input('yurName');
        $fioRuk=$request->input('fioRuk');
        $dolzhnYur=$request->input('dolzhnYur');
        $yurStep=$request->input('yurStep');
        $yurAdress=$request->input('yurAdress');
        $platNumber=$request->input('platNumber');
        $yurPhone=$request->input('yurPhone');
        $yurEmail=$request->input('yurEmail');
        $fioCommand=$request->input('fioCommand');
        $yurLink=$request->input('yurLink');

        $repconc=new Repconc();
        $repconc->owner=Auth::user()->name;
        $repconc->user_id=Auth::user()->id;
        $repconc->nominationName=$nominationName;
        $repconc->nameProject=$nameProject;
        $repconc->fio= $fio;
        
        $repconc->teachWorkPlace=$teachWorkPlace;
        $repconc->dolzhnUch=$dolzhnUch;
        $repconc->uchStep= $uchStep;
        $repconc->adress=$adress;
        $repconc->phone= $phone;
        $repconc->email= $email;
        $repconc->projectLink= $projectLink;
        $repconc->yurName=$yurName;
        $repconc->yurEmail=$yurEmail;
        $repconc->fioRuk= $fioRuk;
        $repconc->dolzhnYur= $dolzhnYur;
        $repconc->yurStep= $yurStep;
        $repconc->yurAdress= $yurAdress;
        $repconc->platNumber=$platNumber;
        $repconc->yurPhone=$yurPhone;
        $repconc->fioCommand=$fioCommand;
        $repconc->yurLink=$yurLink;
        $repconc->save();
        $this->checkboxes($request,$repconc->id);
        $this->inputs($request,$repconc->id);
        $this->rcpi_pass_checkboxed($request,$repconc->id);
        return redirect('cabinet');

        }catch(\Exception $e){
            dd($e->getMessage());
        }
        
      }
      public function rcpi_pass_checkboxed($request,$id){
        $checkedPassCheckboxes=$request->pascheckbox;
        $allcheckboxes=array();
        array_push($allcheckboxes,'Машиностроение и металлообработка','Экология и рациональное использование природных ресурсов',
        'Здравоохранение','Производство, переработка и сбережение сельскохозяйственной продукции','Проблемы строительства и энергетики',
        'Технологии химических, фармацевтических и микробиологических производств','Социально-экономические проблемы и проблемы развития государственности Республики Беларусь',
        'Информатизация, вычислительная техника и информационные технологии','Другое (указать):','Используются либо планируются к использованию объекты интеллектуальной собственности, права на которые подтверждаются соответствующими документами (если такие документы предусмотрены законодательством) или права на использование которых подтверждаются соответствующим договором (указать в пояснении)',
      'Используются либо планируются к использованию потенциальные объекты интеллектуальной собственности (правовая охрана не предоставлена, однако имеются признаки объектов интеллектуальной собственности, для правовой охраны которых необходимо получить охранные документы (патенты, свидетельства)) (указать в пояснении)',
      'Используются либо планируются к использованию потенциальные объекты интеллектуальной собственности, для правовой охраны которым не требуется получение охранных документов (указать в пояснении)','Не согласен','Согласен'
      );
        if(empty($checkedPassCheckboxes)){
          for($i=0; $i<count($allcheckboxes); $i++){
          $rcpicheckbox=new RcpiPassCheckboxes();
          $rcpicheckbox->project_id=$id;
          $rcpicheckbox->value=$allcheckboxes[$i];
          $rcpicheckbox->status=false;
          $rcpicheckbox->save();

          }

        }
        else{
          for($i=0; $i<count($allcheckboxes); $i++){
            $rcpicheckbox= new RcpiPassCheckboxes();
            $rcpicheckbox->project_id=$id;
            $rcpicheckbox->value=$allcheckboxes[$i];
            if(in_array($allcheckboxes[$i],$checkedPassCheckboxes)){
              $rcpicheckbox->status=true;
            }
            else{
              $rcpicheckbox->status=false;
            }
            $rcpicheckbox->save();
          }
        }
      }
      public function inputs($request, $id){
        $rcpistrat=new RcpiStrat();
        $rcpistrat->project_id=$id;
        $rcpistrat->sOtherSbosob= $request->sOtherSbosob;
        $rcpistrat->sDescriptKomerc=$request->sDescriptKomerc;
        $rcpistrat->sStratComerc= $request->sStratComerc;
        $rcpistrat->save();
      }
      public function checkboxes(Request $request,$id){
        $checkedCheckboxes=$request->input('scheckbox');
        $allcheckboxes=array();
        array_push($allcheckboxes,'Определен потенциальный заказчик, наличие потребности рынка;',
      'Определены способы монетизации, определена модель ценообразования, разработана ценовая политика, выбраны каналы продаж;',
        'Предварительный вывод на рынок (определены условия сотрудничества, разработана ценовая политика, подготовлен план маркетинга, получены письменные подтверждения заинтересованности от партнера/потенциальных потребителей);',
        'Отработка замечаний заказчиков (пробные продажи, обратная связь от пользователей, организована система продаж и сервиса);',
        'Вывод продукции на рынок (совершенствование маркетинговой стратегии, подготовка требований к новой версии продукта)',
        'Реализация товаров (работ, услуг), создаваемых (выполняемых, оказываемых) с применением результатов проекта, или использование результатов проекта для собственных нужд;',
        'Предоставление права использования результатов проекта (лицензионный договор, договор комплексной предпринимательской лицензии (франчайзинг), договор о предоставлении секретов производства (ноу-хау);',
        'Полная передача прав на результаты проекта (отчуждение прав, продажа прав);',
        'Заинтересованность в приобретении результатов проекта (письма заинтересованности, соглашения о намерении, меморандумы о сотрудничестве и т.п.);',
        'Иные способы(указать)'
      );
      if(empty($checkedCheckboxes)){
        for($i=0; $i<count($allcheckboxes); $i++){
          $rcpicheckbox= new RcpiStratCheckboxes();
          $rcpicheckbox->project_id=$id;
          $rcpicheckbox->value=$allcheckboxes[$i];
          $rcpicheckbox->status=false;
          $rcpicheckbox->save();
        }
      }
      else {
      for($i=0; $i<count($allcheckboxes); $i++){
        $rcpicheckbox= new RcpiStratCheckboxes();
        $rcpicheckbox->project_id=$id;
        $rcpicheckbox->value=$allcheckboxes[$i];
        if(in_array($allcheckboxes[$i],$checkedCheckboxes)){
          $rcpicheckbox->status=true;
        }
        else{
          $rcpicheckbox->status=false;
        }
        $rcpicheckbox->save();
      }
      }

    }
      public function form66_update(Request $request, $name,$id){

  
        try{
            $nominationName=$request->input('nominationName');
            $nameProject=$request->input('nameProject');
            $fio=$request->input('fio');
            $teachWorkPlace=$request->input('teachWorkPlace');
            $dolzhnUch=$request->input('dolzhnUch');
            $uchStep=$request->input('uchStep');
            $adress=$request->input('adress');
            $phone=$request->input('phone');
            $email=$request->input('email');
            $projectLink=$request->input('projectLink');
            $yurName=$request->input('yurName');
            $fioRuk=$request->input('fioRuk');
            $dolzhnYur=$request->input('dolzhnYur');
            $yurStep=$request->input('yurStep');
            $yurAdress=$request->input('yurAdress');
            $platNumber=$request->input('platNumber');
            $yurPhone=$request->input('yurPhone');
            $yurEmail=$request->input('yurEmail');
            $fioCommand=$request->input('fioCommand');
            $yurLink=$request->input('yurLink');

          $repconc=Repconc::find($id);
          $repconc->nominationName=$nominationName;
          $repconc->nameProject=$nameProject;
          $repconc->fio= $fio;
          
          $repconc->teachWorkPlace=$teachWorkPlace;
          $repconc->dolzhnUch=$dolzhnUch;
          $repconc->uchStep= $uchStep;
          $repconc->adress=$adress;
          $repconc->phone= $phone;
          $repconc->email= $email;
          $repconc->projectLink= $projectLink;
          $repconc->yurName=$yurName;
          $repconc->yurEmail=$yurEmail;
          $repconc->fioRuk= $fioRuk;
          $repconc->dolzhnYur= $dolzhnYur;
          $repconc->yurStep= $yurStep;
          $repconc->yurAdress= $yurAdress;
          $repconc->platNumber=$platNumber;
          $repconc->yurPhone=$yurPhone;
          $repconc->fioCommand=$fioCommand;
          $repconc->yurLink=$yurLink;
          $repconc->save();
          $this->form66_updatecheckboxesStrat($request, $repconc->id);
          $this->form66_updateInputsStrat($request, $repconc->id);
          if(Auth::user()->Role=="Admin"){
            $user = User::where('name', $repconc->owner)->first();
            $data=$repconc->name."_#".$repconc->id;
            $user->notify(new Edit($data));
        }
          return redirect('cabinet');
          }catch(\Exception $e){
              dd($e->getMessage());
          }
    
      }
      public function form66_updatecheckboxesStrat($request, $id){

 $checkedCheckboxes=$request->scheckbox;
        $allcheckboxes=array();
        array_push($allcheckboxes,'Определен потенциальный заказчик, наличие потребности рынка;',
      'Определены способы монетизации, определена модель ценообразования, разработана ценовая политика, выбраны каналы продаж;',
        'Предварительный вывод на рынок (определены условия сотрудничества, разработана ценовая политика, подготовлен план маркетинга, получены письменные подтверждения заинтересованности от партнера/потенциальных потребителей);',
        'Отработка замечаний заказчиков (пробные продажи, обратная связь от пользователей, организована система продаж и сервиса);',
        'Вывод продукции на рынок (совершенствование маркетинговой стратегии, подготовка требований к новой версии продукта)',
        'Реализация товаров (работ, услуг), создаваемых (выполняемых, оказываемых) с применением результатов проекта, или использование результатов проекта для собственных нужд;',
        'Предоставление права использования результатов проекта (лицензионный договор, договор комплексной предпринимательской лицензии (франчайзинг), договор о предоставлении секретов производства (ноу-хау);',
        'Полная передача прав на результаты проекта (отчуждение прав, продажа прав);',
        'Заинтересованность в приобретении результатов проекта (письма заинтересованности, соглашения о намерении, меморандумы о сотрудничестве и т.п.);',
        'Иные способы(указать)'
      );
      $rcpicheckbox=RcpiStratCheckboxes::where('project_id', $id)->delete();
      if(empty($checkedCheckboxes)){
        for($i=0; $i<count($allcheckboxes); $i++){
          $rcpicheckbox= new RcpiStratCheckboxes();
          $rcpicheckbox->project_id=$id;
          $rcpicheckbox->value=$allcheckboxes[$i];
          $rcpicheckbox->status=false;
          $rcpicheckbox->save();
        }
      }
      else {
      for($i=0; $i<count($allcheckboxes); $i++){
        $rcpicheckbox= new RcpiStratCheckboxes();
        $rcpicheckbox->project_id=$id;
        $rcpicheckbox->value=$allcheckboxes[$i];
        if(in_array($allcheckboxes[$i],$checkedCheckboxes)){
          $rcpicheckbox->status=true;
        }
        else{
          $rcpicheckbox->status=false;
        }
        $rcpicheckbox->save();
      }
      }
      }
      public function form66_updateInputsStrat($request,$id){
        $rcpistrat=RcpiStrat::where('project_id', $id)->delete();
        $rcpistrat= new RcpiStrat();
        $rcpistrat->project_id=$id;
        $rcpistrat->sOtherSbosob= $request->sOtherSbosob;
        $rcpistrat->sDescriptKomerc=$request->sDescriptKomerc;
        $rcpistrat->sStratComerc= $request->sStratComerc;
        $rcpistrat->save();
      }
}
