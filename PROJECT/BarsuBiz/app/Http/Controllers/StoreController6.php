<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\RcpiBp;
use App\Models\RcpiPass;
use App\Models\RcpiPassCheckboxes;
use App\Models\Repconc;
use App\Notifications\Edit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RcpiStratCheckboxes;
use App\Models\RcpiStrat;
use App\Models\RcpiTeo;

class StoreController6 extends Controller
{
    public function store(Request $request){
       
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
        $this->form66_rcpi_pass($request,$repconc->id);
        $age = Carbon::parse(Auth::user()->birthdate)->age;
        if($age>30){
        $this->form66_rcpibps($request ,$repconc->id);
        }
        else{
          $this->form66_rcpi_teo($request,$repconc->id);
        }
        return redirect('cabinet');
        
      }
      public function form66_rcpi_teo($request,$id){
        $rcpiteo= new RcpiTeo();
        $rcpiteo->teoPotrProblem=$request->teoPotrProblem;
        $rcpiteo->teoDescripProd=$request->teoDescripProd;
        $rcpiteo->teoBizModel=$request->teoBizModel;
        $rcpiteo->teoRinokInf=$request->teoRinokInf;
        $rcpiteo->teoDescripTechn=$request->teoDescripTechn;
        $rcpiteo->teoConcurent=$request->teoConcurent;
        $rcpiteo->teoIntSobstv=$request->teoIntSobstv;
        $rcpiteo->teoTeamProject=$request->teoTeamProject;
        $rcpiteo->teoMarketing=$request->teoMarketing;
        $rcpiteo->teoFinIndic=$request->teoFinIndic;
        $rcpiteo->teoUnitEconomy=$request->teoUnitEconomy;
        $rcpiteo->teoInvestPerm=$request->teoInvestPerm;
        $rcpiteo->teoRiskProject=$request->teoRiskProject;
        $rcpiteo->teoRelizeTemp=$request->teoRelizeTemp;
        $rcpiteo->project_id=$id;
        $rcpiteo->save();
      }

      public function form66_rcpi_pass($request, $id){
        $pasNameProject=$request->pasNameProject;
        $pasKratkDescrip= $request->pasKratkDescrip;
        $pasOtherSphere=$request->pasOtherSphere;
        $pasRinokSbita=$request->pasRinokSbita;
        $pasGeneralPer= $request->pasGeneralPer;
        $pasDescription= $request->pasDescription;
        $pasRealizationTemp= $request->pasRealizationTemp;
        $pasObjectComerc= $request->pasObjectComerc;
        $pasDoztizhProject= $request->pasDoztizhProject;
        $pasDopInformation= $request->pasDopInformation;
      
        $rcpipass=new RcpiPass();
        $rcpipass->project_id= $id;
        $rcpipass->pasNameProject= $pasNameProject;
        $rcpipass->pasKratkDescrip= $pasKratkDescrip;
        $rcpipass->pasOtherSphere= $pasOtherSphere;
        $rcpipass->pasRinokSbita=$pasRinokSbita;
        $rcpipass->pasGeneralPer= $pasGeneralPer;
        $rcpipass->pasDescription= $pasDescription;
        $rcpipass->pasRealizationTemp= $pasRealizationTemp;
        $rcpipass->pasObjectComerc=$pasObjectComerc;
        $rcpipass->pasDoztizhProject= $pasDoztizhProject;
        $rcpipass->pasDopInformation= $pasDopInformation;
        $rcpipass->pasAnotherStage=$request->pasAnotherStage;
        $rcpipass->pasOtherAnalog=$request->pasOtherAnalog;
        $rcpipass->save();
      }
      public function form66_rcpi_pass_update($request,$id){

        
        $pasNameProject=$request->pasNameProject;
        $pasKratkDescrip= $request->pasKratkDescrip;
        $pasOtherSphere=$request->pasOtherSphere;
        $pasRinokSbita=$request->pasRinokSbita;
        $pasGeneralPer= $request->pasGeneralPer;
        $pasDescription= $request->pasDescription;
        $pasRealizationTemp= $request->pasRealizationTemp;
        $pasObjectComerc= $request->pasObjectComerc;
        $pasDoztizhProject= $request->pasDoztizhProject;
        $pasDopInformation= $request->pasDopInformation;
      
        $rcpipass=RcpiPass::where("project_id",$id)->delete();
        $rcpipass= new RcpiPass();
        $rcpipass->project_id= $id;
        $rcpipass->pasNameProject= $pasNameProject;
        $rcpipass->pasKratkDescrip= $pasKratkDescrip;
        $rcpipass->pasOtherSphere= $pasOtherSphere;
        $rcpipass->pasRinokSbita=$pasRinokSbita;
        $rcpipass->pasGeneralPer= $pasGeneralPer;
        $rcpipass->pasDescription= $pasDescription;
        $rcpipass->pasRealizationTemp= $pasRealizationTemp;
        $rcpipass->pasObjectComerc=$pasObjectComerc;
        $rcpipass->pasDoztizhProject= $pasDoztizhProject;
        $rcpipass->pasDopInformation= $pasDopInformation;
        $rcpipass->pasAnotherStage=$request->pasAnotherStage;
        $rcpipass->pasOtherAnalog=$request->pasOtherAnalog;
        $rcpipass->save();
      }
      public function update_rcpi_pass_checkboxes($request, $id){
        $rcpipasscheck=RcpiPassCheckboxes::where("project_id",$id)->delete();
        $checkedPassCheckboxes=$request->pascheckbox;
        $allcheckboxes=array();
        array_push($allcheckboxes,'Машиностроение и металлообработка','Экология и рациональное использование природных ресурсов',
        'Здравоохранение','Производство, переработка и сбережение сельскохозяйственной продукции','Проблемы строительства и энергетики',
        'Технологии химических, фармацевтических и микробиологических производств','Социально-экономические проблемы и проблемы развития государственности Республики Беларусь',
        'Информатизация, вычислительная техника и информационные технологии','Другое (указать):','Не имеет аналогов','Нет аналогов в стране, есть за рубежом',
        'Нет аналогов за рубежом, есть в стране','Есть сведения об отечественных и зарубежных аналогах','Другое (указать):','Идея','Разработана документация (научно-техническая, проектно-сметная, конструкторская, технологическая и др.)',
        'Работающий прототип','Опытный образец','Первые продажи','Создание нового производства','Расширение существующего производства','Иное (указать):',
        'Используются либо планируются к использованию объекты интеллектуальной собственности, права на которые подтверждаются соответствующими документами (если такие документы предусмотрены законодательством) или права на использование которых подтверждаются соответствующим договором (указать в пояснении)',
      'Используются либо планируются к использованию потенциальные объекты интеллектуальной собственности (правовая охрана не предоставлена, однако имеются признаки объектов интеллектуальной собственности, для правовой охраны которых необходимо получить охранные документы (патенты, свидетельства)) (указать в пояснении)',
      'Используются либо планируются к использованию потенциальные объекты интеллектуальной собственности, для правовой охраны которым не требуется получение охранных документов (указать в пояснении)','Используются либо планируются к использованию потенциальные объекты интеллектуальной собственности, для правовой охраны которым не требуется получение охранных документов (указать в пояснении)','Не согласен','Согласен'
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
      public function rcpi_pass_checkboxed($request,$id){
        $checkedPassCheckboxes=$request->pascheckbox;
        $allcheckboxes=array();
        array_push($allcheckboxes,'Машиностроение и металлообработка','Экология и рациональное использование природных ресурсов',
        'Здравоохранение','Производство, переработка и сбережение сельскохозяйственной продукции','Проблемы строительства и энергетики',
        'Технологии химических, фармацевтических и микробиологических производств','Социально-экономические проблемы и проблемы развития государственности Республики Беларусь',
        'Информатизация, вычислительная техника и информационные технологии','Другое (указать):','Не имеет аналогов','Нет аналогов в стране, есть за рубежом',
        'Нет аналогов за рубежом, есть в стране','Есть сведения об отечественных и зарубежных аналогах','Другое (указать):','Идея','Разработана документация (научно-техническая, проектно-сметная, конструкторская, технологическая и др.)',
        'Работающий прототип','Опытный образец','Первые продажи','Создание нового производства','Расширение существующего производства','Иное (указать):',
        'Используются либо планируются к использованию объекты интеллектуальной собственности, права на которые подтверждаются соответствующими документами (если такие документы предусмотрены законодательством) или права на использование которых подтверждаются соответствующим договором (указать в пояснении)',
      'Используются либо планируются к использованию потенциальные объекты интеллектуальной собственности (правовая охрана не предоставлена, однако имеются признаки объектов интеллектуальной собственности, для правовой охраны которых необходимо получить охранные документы (патенты, свидетельства)) (указать в пояснении)',
      'Используются либо планируются к использованию потенциальные объекты интеллектуальной собственности, для правовой охраны которым не требуется получение охранных документов (указать в пояснении)','Используются либо планируются к использованию потенциальные объекты интеллектуальной собственности, для правовой охраны которым не требуется получение охранных документов (указать в пояснении)','Не согласен','Согласен'
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
        $rcpistrat->sFio=$request->sFio;
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
    public function form66_rcpibps($request ,$id){
      $rcpibps=new RcpiBp();
      $rcpibps->project_id=$id;
      $rcpibps->bpFio=$request->bpFio;
      $rcpibps->bpSoderzh=$request->bpSoderzh;
      $rcpibps->bpResume=$request->bpResume;
      $rcpibps->bpProblem=$request->bpProblem;
      $rcpibps->bpProduct=$request->bpProduct;
      $rcpibps->bpAnalize=$request->bpAnalize;
      $rcpibps->bpSobstv=$request->bpSobstv;
      $rcpibps->bpPotreb=$request->bpPotreb;
      $rcpibps->bpPrice=$request->bpPrice;
      $rcpibps->bpConcurents=$request->bpConcurents;
      $rcpibps->bpSuppliers=$request->bpSuppliers;
      $rcpibps->bpProizPlan=$request->bpProizPlan;
      $rcpibps->bpOrgPlan=$request->bpOrgPlan;
      $rcpibps->bpRelizeProblems=$request->bpRelizeProblems;
      $rcpibps->bpFinPlan=$request->bpFinPlan;
      $rcpibps->bpInformation=$request->bpInformation;
      $rcpibps->save();
    }
    public function form66_teo_update($request,$id){
      $rcpiteo=RcpiTeo::where("project_id",$id)->delete();
      $rcpiteo=new RcpiTeo();
      $rcpiteo->project_id=$id;
      $rcpiteo->teoPotrProblem=$request->teoPotrProblem;
      $rcpiteo->teoDescripProd=$request->teoDescripProd;
      $rcpiteo->teoBizModel=$request->teoBizModel;
      $rcpiteo->teoRinokInf=$request->teoRinokInf;
      $rcpiteo->teoDescripTechn=$request->teoDescripTechn;
      $rcpiteo->teoConcurent=$request->teoConcurent;
      $rcpiteo->teoIntSobstv=$request->teoIntSobstv;
      $rcpiteo->teoTeamProject=$request->teoTeamProject;
      $rcpiteo->teoMarketing=$request->teoMarketing;
      $rcpiteo->teoFinIndic=$request->teoFinIndic;
      $rcpiteo->teoUnitEconomy=$request->teoUnitEconomy;
      $rcpiteo->teoInvestPerm=$request->teoInvestPerm;
      $rcpiteo->teoRiskProject=$request->teoRiskProject;
      $rcpiteo->teoRelizeTemp=$request->teoRelizeTemp;
      $rcpiteo->save();
    }
    public function form66_rcpibps_update($request ,$id){
      $rcpibps = RcpiBp::where("project_id",$id)->delete();
      $rcpibps=new RcpiBp();
      $rcpibps->project_id=$id;
      $rcpibps->bpFio=$request->bpFio;
      $rcpibps->bpSoderzh=$request->bpSoderzh;
      $rcpibps->bpResume=$request->bpResume;
      $rcpibps->bpProblem=$request->bpProblem;
      $rcpibps->bpProduct=$request->bpProduct;
      $rcpibps->bpAnalize=$request->bpAnalize;
      $rcpibps->bpSobstv=$request->bpSobstv;
      $rcpibps->bpPotreb=$request->bpPotreb;
      $rcpibps->bpPrice=$request->bpPrice;
      $rcpibps->bpConcurents=$request->bpConcurents;
      $rcpibps->bpSuppliers=$request->bpSuppliers;
      $rcpibps->bpProizPlan=$request->bpProizPlan;
      $rcpibps->bpOrgPlan=$request->bpOrgPlan;
      $rcpibps->bpRelizeProblems=$request->bpRelizeProblems;
      $rcpibps->bpFinPlan=$request->bpFinPlan;
      $rcpibps->bpInformation=$request->bpInformation;
      $rcpibps->save();
    }
      public function form66_update(Request $request, $name,$id){

  
       
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
            try{
          $repconc=Repconc::findOrFail($id);
          
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
          $this->form66_rcpi_pass_update($request, $repconc->id);
          $user=User::where("id",$repconc->user_id)->get();
          $age = Carbon::parse($user->first()->birthdate)->age;
          if($age>30){
          $this->form66_rcpibps_update($request, $repconc->id);
          }
          else{
            $this->form66_teo_update($request,$repconc->id);
          }
          $this->update_rcpi_pass_checkboxes($request, $id);
          if(Auth::user()->Role=="Admin"){
            $user = User::where('name', $repconc->owner)->first();
            $data=$repconc->name."_#".$repconc->id;
            $user->notify(new Edit($data));
        }
          return redirect('cabinet');
          }
          catch(\Exception $e){
            return redirect('cabinet')->with('notFound','Страница не найдена');
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
        $rcpistrat->sFio=$request->sFio;
        $rcpistrat->sOtherSbosob= $request->sOtherSbosob;
        $rcpistrat->sDescriptKomerc=$request->sDescriptKomerc;
        $rcpistrat->sStratComerc= $request->sStratComerc;
        $rcpistrat->save();
      }
}
