<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/formstyle.css') }}" rel="stylesheet">
<link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Составление шаблона</title>
    <style>
        <? 
  use Carbon\Carbon;
  $dateOfBirth = $user->first()->birthdate; // Это ваша дата рождения
  $age = Carbon::parse($dateOfBirth)->age;
        ?>
    body {
  font-family: 'Inter', 'sans-serif';
/* Замените 'путь_к_вашему_изображению.jpg' на путь к вашему фоновому изображению */
  background-size: cover; /* Растягивать фон до заполнения всего экрана */
  background-repeat: no-repeat; /* Не повторять фон */
  background-attachment: fixed; /* Фиксировать фон, чтобы он не двигался при прокрутке */
};
    </style>
</head>
<body>
    <!--Main container-->
    <div class="container d-flex justify-content-center align-items-center min-vh-100 p-4">
        
        <form  method="post"  class="col-md-6 right-box p-3 rounded-4 shadow box-area" action="{{ route('form66_update', ['name' => $repconc->name,'id' => $repconc->id]) }}">
            @csrf
            <ul class="nav justify-content-center">
  <li class="nav-item mt-2 mb-2">
    
  <button type="button" data-part="1" onclick="openPart(1)" class="btn btn-outline-danger rounded-4" href="#"><i class="bi bi-file-earmark-text"></i> Заявка</button>
  
  </li>
  @if($age>30)
  <li class="nav-item px-3 mt-2">
  <button type="button"  data-part="2" onclick="openPart(2)" class="btn btn-outline-danger rounded-4" href="#"><i class="bi bi-clipboard2-data"></i> Бизнес план</button>
  </li>
  @else
  <li class="nav-item px-3 mt-2">
  <button type="button"  data-part="5" onclick="openPart(5)" class="btn btn-outline-danger rounded-4" href="#"><i class="bi bi-clipboard2-data"></i> ТЭО</button>
  </li>
  @endif
  <li class="nav-item mt-2">
  <button type="button" data-part="3" onclick="openPart(3)" class="btn btn-outline-danger rounded-4" href="#"><i class="bi bi-graph-up-arrow"></i> Стратегия</button>
  </li>
  <li class="nav-item mt-2 px-3 mb-3">
  <button type="button" data-part="4" onclick="openPart(4)" class="btn btn-outline-danger rounded-4" href="#"><i class="bi bi-passport"></i> Пасспорт ИП</button>
  </li>
</ul>
            <div class="row align-items-center ">
            <div class="mb-5 ms-auto">
                <img src="{{asset('assets/img/logo.png')}}" class="logo" width="210px">
        </div> 
        <div class="part" data-part="1" style="display: none;">
                <div class="header-text mb-4">
                    <h2 style="text-align: center;">Заявка 
                        </h2>
                        <h3 style="text-align: center;">На участие в республиканском конкурсе инновационных проектов</h3>
                </div>
                <p>Название номинации</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="nominationName" value="{{$repconc->nominationName}}">
                </div>
                <p>Наименование инновационного проекта (далее – проект)</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="nameProject" value="{{$repconc->nameProject}}">
                </div>
                <!--
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:"></textarea>
                </div>
                -->
                <h4 style="text-align: center;">Физическое лицо или индивидуальный предприниматель</h4>
                <p>Фамилия, собственное имя, отчество (если таковое имеется) заявителя </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="fio" value="{{$repconc->fio}}">
                </div>
                <p>Место работы/учебы </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="teachWorkPlace" value="{{$repconc->teachWorkPlace}}">
                </div>
                <p>Должность служащего</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="dolzhnUch" value="{{$repconc->dolzhnUch}}">
                </div>
                <p>Ученая степень/ученое звание </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="uchStep" value="{{$repconc->uchStep}}">
                </div>
                <p>Адрес места жительства или пребывания</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="adress" value="{{$repconc->adress}}">
                </div>
                <p>Контактный номер телефона</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="phone" value="{{$repconc->phone}}">
                </div>
                <p>Электронная почта</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="email" value="{{$repconc->email}}">
                </div>
                <p>Ссылка на сайт проекта, группа в социальных сетях</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="projectLink" value="{{$repconc->projectLink}}">
                </div>
                <h4 style="text-align: center;">Юридическое лицо</h4>
                <p>Наименование (полное наименование юридического лица с указанием организационно-правовой формы)</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="yurName" value="{{$repconc->yurName}}">
                </div>
                <p>Фамилия, собственное имя, отчество (если таковое имеется) руководителя </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="fioRuk" value="{{$repconc->fioRuk}}">
                </div>
                <p>Должность служащего</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="dolzhnYur" value="{{$repconc->dolzhnYur}}">
                </div>
                <p>Ученая степень/ученое звание</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="yurStep" value="{{$repconc->yurStep}}">
                </div>
                <p>Юридический адрес/почтовый адрес</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="yurAdress" value="{{$repconc->yurAdress}}">
                </div>
                <p>Учетный номер плательщика</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="platNumber" value="{{$repconc->platNumber}}">
                </div>
                <p>Контактный номер телефона</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="yurPhone" value="{{$repconc->yurPhone}}">
                </div>
                <p>Электронная почта</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="yurEmail" value="{{$repconc->yurEmail}}">
                </div>
                <p>Фамилия, собственное имя, отчество (если таковое имеется) членов команды проекта (при наличии)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="fioCommand" >{{$repconc->fioCommand}}</textarea>
                </div>
                <p>Ссылка на сайт проекта, группа в социальных сетях</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="yurLink" value="{{$repconc->yurLink}}">
                </div>
        </div>

          <!-- Part 2!-->
          @if($age>30)
          <div class="part" data-part="2" style="display: none;">
                <div class="header-text mb-4">
                    <h2 style="text-align: center;">Бизнес план
                        </h2>
                        <h3 style="text-align: center;">На участие в республиканском конкурсе инновационных проектов</h3>
                </div>
                <p>Титульный лист (фамилия, собственное имя и отчество участника, если таковое имеется (для физического лица или индивидуального предпринимателя), полное наименование юридического лица с указанием организационно-правовой формы (для юридического лица), адрес, контактные данные, наименование проекта, наименование номинации)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpFio">{{$rcpibp->first()->bpFio}}</textarea>
                </div>
                <p>Содержание (названия разделов, подразделов, приложений, ссылки на страницы и т.п.) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpSoderzh">{{$rcpibp->first()->bpSoderzh}}</textarea>
                </div>
   
                <p>Резюме (основная идея проекта, основные выводы и результаты по разделам бизнес-плана проекта и т.п.)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpResume">{{$rcpibp->first()->bpResume}}</textarea>
                </div>
                <p>Описание проекта (общая характеристика ситуации в данной сфере; существующая проблема, которую решает проект; цель проекта и т.п.)  </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpProblem">{{$rcpibp->first()->bpProblem}}</textarea>
                </div>
                <p>Описание продукции (особенности продукции по сравнению с существующими на рынке аналогами; правовое регулирование деятельности компании на планируемом рынке (специальное разрешение (лицензия), сертификация продукции; технология производства продукции, научная основа проекта, проведенные научно-исследовательские, опытно-конструкторские и опытно-технологические работы и т.п.) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpProduct">{{$rcpibp->first()->bpProduct}}</textarea>
                </div>
                <p>Анализ отрасли и рынка, маркетинг (перечень основной продукции и услуг, предлагаемых данной отраслью; географическое положение рынка (локальный, региональный, национальный, международный); общий объем продаж по отрасли и тенденции изменения рынка; данные независимых экспертов, оценивающих конъюнктуру рынка, опубликованные прогнозы будущего развития рынка; специфические особенности рынка; описание сегмента рынка, на котором предполагается выполнение проекта; планы относительно зарубежных рынков, экспортный потенциал и т.п.)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpAnalize">{{$rcpibp->first()->bpAnalize}}</textarea>
                </div>
                <p>Использование объектов интеллектуальной собственности (потенциальных объектов интеллектуальной собственности) (объекты интеллектуальной собственности (потенциальные объекты интеллектуальной собственности), которые используются или планируется использовать в рамках проекта, включая объекты интеллектуальной собственности, права на которые принадлежат участнику конкурса или права на использование которых получены по соответствующему договору; документы, подтверждающие права на объекты интеллектуальной собственности (патент, свидетельство, договор уступки исключительного права) или права на использование объектов интеллектуальной собственности (лицензионный договор, договор комплексной предпринимательской лицензии или иные договоры, предусмотренные законодательством); авторы объекта интеллектуальной собственности и иные обладатели прав на объект интеллектуальной собственности)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpSobstv">{{$rcpibp->first()->bpSobstv}}</textarea>
                </div>
                <p>Основные потребители и характеристика сбытовой политики (основные потребители продукции и их характеристика; методы продвижения и каналы сбыта продукции и т.п.) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpPotreb">{{$rcpibp->first()->bpPotreb}}</textarea>
                </div>
                <p>Ценообразование (оценка конкурентоспособности продукции по цене; себестоимость продукции и ее составляющие; тенденции ценообразования; планируемые объемы сбыта и т.п.)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpPrice">{{$rcpibp->first()->bpPrice}}</textarea>
                </div>
                <p>Конкуренты (описание основных конкурентов; возможности конкурентов (тактика и стратегия, продукция, цены, местонахождение, продажи и т.п.)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpConcurents">{{$rcpibp->first()->bpConcurents}}</textarea>
                </div>
                <p>Поставщики (описание организаций-поставщиков; перечень необходимых материалов, цена и т.п.)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpSuppliers">{{$rcpibp->first()->bpSuppliers}}</textarea>
                </div>
                <p>Производственный план (наличие материально-технической базы, потребность в оборудовании, сырье и материалах для производства продукции, планируемые объемы выпуска, безопасность, экологичность и т.п.)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpProizPlan">{{$rcpibp->first()->bpProizPlan}}</textarea>
                </div>
                <p>Организационный план (кадровая структура организации, выполняющей работы (персонал, структура и т.п.); график выполнения работ (календарный план); график осуществления инвестиций; формы финансирования проекта (кредит, заем, собственные средства и т.п.)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpOrgPlan">{{$rcpibp->first()->bpOrgPlan}}</textarea>
                </div>
                <p>Возможные проблемы реализации проекта (финансовые и другие риски исполнения проекта и т.п.)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpRelizeProblems">{{$rcpibp->first()->bpRelizeProblems}}</textarea>
                </div>
                <p>Финансовый план проекта (доходы; текущие производственные затраты; инвестиционные затраты (капитальные вложения, оборотный капитал); источники финансирования; характеристика эффективности проекта; характеристика финансовой состоятельности проекта; анализ чувствительности показателей проекта к изменению исходных параметров и т.п.) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpFinPlan">{{$rcpibp->first()->bpFinPlan}}</textarea>
                </div>
                <p>Иные сведения (бизнес-план может дополнительно содержать иные необходимые разделы и сведения) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="bpInformation">{{$rcpibp->first()->bpInformation}}</textarea>
                </div>
                </div>
                @else
            
                
                              <!-- Part 5 -->
                              <div class="part" data-part="5" style="display: none;">
                <div class="header-text mb-4">
                    <h2 style="text-align: center;">ТЭО
                        </h2>
                        <h3 style="text-align: center;">На участие в республиканском конкурсе инновационных проектов</h3>
                </div>
                <p>Проблема потребителя (указать существующую проблему, которую решает проект) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoPotrProblem">{{$rcpiteo->first()->teoPotrProblem}}</textarea>
                </div>
                <p>Описание продукта/услуги (в том числе указать, каким образом проект решает проблемы. Стадия развития проекта) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoDescripProd">{{$rcpiteo->first()->teoDescripProd}}</textarea>
                </div>
   
                <p>Бизнес-модель (указать, каким образом в проект поступает выручка)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoBizModel">{{$rcpiteo->first()->teoBizModel}}</textarea>
                </div>
                <p>Информация о рынке (клиенты, объем рынка, желаемая доля рынка, каналы продаж, план выхода на рынок, бюджеты маркетинга и продвижения)   </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoRinokInf">{{$rcpiteo->first()->teoRinokInf}}</textarea>
                </div>
                <p>Описание технологии (в том числе обоснование, что ее коммерциализация принесет положительный экономический эффект (влияние технологии на рост выручки или снижение затрат)  </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoDescripTechn">{{$rcpiteo->first()->teoDescripTechn}}</textarea>
                </div>
                <p>Конкуренты и конкурентное преимущество (описать важнейших конкурентов (лучше – в форме таблицы и сравнить их по 3 5 параметрам). Кратко описать, кто конкурирует, за счет чего, почему можно приобрести долю рынка. Сделать акцент на основных преимуществах, отличии продукта/услуги от имеющихся на рынках, конкурентоспособности (причины)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoConcurent">{{$rcpiteo->first()->teoConcurent}}</textarea>
                </div>
                <p>Интеллектуальная собственность (объекты интеллектуальной собственности (потенциальные объекты интеллектуальной собственности), которые используются или планируется использовать в рамках проекта, включая объекты интеллектуальной собственности, права на которые принадлежат участнику конкурса или права на использование которых получены по соответствующему договору; документы, подтверждающие права на объекты интеллектуальной собственности (если получение таких документов предусмотрено законодательством) или права на использование объектов интеллектуальной собственности. В случае если имеется потенциальный объект интеллектуальной собственности, указать на необходимость получения охранных документов (патент, свидетельство) или на возможность предоставления правовой охраны в качестве секрета производства (ноу-хау) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoIntSobstv">{{$rcpiteo->first()->teoIntSobstv}}</textarea>
                </div>
                <p>Команда проекта (описать основных членов команды, роль в проекте, предыдущий опыт, успешные истории) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoTeamProject">{{$rcpiteo->first()->teoTeamProject}}</textarea>
                </div>
                <p>Маркетинг (описать стратегию маркетингового продвижения продукта, и построение стратегии продаж (каналы, методы, кто будет первым покупателем и т.п.)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoMarketing">{{$rcpiteo->first()->teoMarketing}}</textarea>
                </div>
                <p>Финансовые показатели проекта (прогноз на ближайшие 5 лет: выручка, себестоимость, коммерческие/общие/административные расходы, EBITDA, амортизация, проценты, налоги, чистая прибыль) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoFinIndic">{{$rcpiteo->first()->teoFinIndic}}</textarea>
                </div>
                <p>Юнит-экономика проекта (при необходимости) (главные экономические показатели проекта: стоимость привлечения клиента, средний чек, процент удержания и т.п. Шаги по улучшению показателей) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoUnitEconomy">{{$rcpiteo->first()->teoUnitEconomy}}</textarea>
                </div>
                <p>Инвестиционная привлекательность проекта (свободный денежный поток проекта, NPV проекта, IRR проекта, срок окупаемости) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoInvestPerm">{{$rcpiteo->first()->teoInvestPerm}}</textarea>
                </div>
                <p>Риски проекта (указать барьеры, риски, пути их устранения) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoRiskProject">{{$rcpiteo->first()->teoRiskProject}}</textarea>
                </div>
                <p>Основные стадии реализации проекта (существующее положение, стратегия развития. Под какие стадии необходимы инвестиции, в каком размере, на что будут тратиться, как возвращаться) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="teoRelizeTemp">{{$rcpiteo->first()->teoRelizeTemp}}</textarea>
                </div>
                </div>
                @endif

                <!-- Part 3!-->

                <div class="part p-4" data-part="3" style="display: none;">
                <div class="header-text mb-4">
                    <h2 style="text-align: center;">Стратегия
                        </h2>
                        <h3 style="text-align: center;">На участие в республиканском конкурсе инновационных проектов</h3>
                </div>
                <p>Фамилия, собственное имя, отчество (если таковое имеется) физического лица/индивидуального предпринимателя,либо полное наименование юридического лица</p>
                <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="sFio">{{$rcpistrat->first()->sFio}}</textarea>
            </div>
                <p><b>Уровень коммерциализации на момент подачи заявки:</b><p>
                @for($i = 0; $i < 5; $i++)
   <div class="form-check mb-3">
       <input class="form-check-input" name="scheckbox[]" type="checkbox" value="{{$repconc_strat_checkbox[$i]->value}}" id="flexCheckDefault" {{$repconc_strat_checkbox[$i]->status ? 'checked' : '' }}>
       <label class="form-check-label" for="flexCheckDefault">
           {{$repconc_strat_checkbox[$i]->value}}
       </label>
   </div>
@endfor
<p><b>Выбор способа коммерциализации:</b><p>
@for($i = 5; $i < 10; $i++)
   <div class="form-check mb-3">
       <input class="form-check-input" name="scheckbox[]" type="checkbox" value="{{$repconc_strat_checkbox[$i]->value}}" id="flexCheckDefault" {{$repconc_strat_checkbox[$i]->status ? 'checked' : '' }}>
       <label class="form-check-label" for="flexCheckDefault">
           {{$repconc_strat_checkbox[$i]->value}}
       </label>
   </div>
@endfor
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="sOtherSbosob">{{$rcpistrat->first()->sOtherSbosob}}</textarea>
            </div>
            <p>Описание стратегии коммерциализации (план действий) на ближайший год:  </p>
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="sDescriptKomerc">{{$rcpistrat->first()->sDescriptKomerc}}</textarea>
            </div>
            <p>Стратегия коммерциализации на последующие 5 лет:  </p>
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="sStratComerc">{{$rcpistrat->first()->sStratComerc}}</textarea>
            </div>

                </div>
                 

                <!-- Part 4-->
                <div class="part p-4" data-part="4" style="display: none;">
                <div class="header-text mb-4">
                    <h2 style="text-align: center;">Пасспорт ИП
                        </h2>
                        <h3 style="text-align: center;">На участие в республиканском конкурсе инновационных проектов</h3>
                </div>
                <p>Наименование инновационного проекта  (далее – проект)</p>
                
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="pasNameProject">{{$rcpipass->first()->pasNameProject}}</textarea>
            </div>
            <p>Краткое описание проекта(не более 2000 знаков)</p>
                   
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="pasKratkDescrip">{{$rcpipass->first()->pasKratkDescrip}}</textarea>
            </div>
            <p><b>Область применения(выбрать из списка не более 2-х)</b></p>
            @for($i = 0; $i <=8; $i++)
            <div class="form-check mb-3">
            <input class="form-check-input" name="pascheckbox[]" type="checkbox" value="{{$rcpipass_checkbox[$i]->value}}" id="flexCheckDefault" {{$rcpipass_checkbox[$i]->status ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckDefault">
            {{$rcpipass_checkbox[$i]->value}}
            </label>
            </div>
            @endfor
            
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="pasOtherSphere">{{$rcpipass->first()->pasOtherSphere}}</textarea>
            </div>
            <p><b>Новизна, оригинальность продукции (отметить нужный пункт в перечне)</b></p>
            @for($i = 9; $i < 14; $i++)
            <div class="form-check mb-3">
            <input class="form-check-input" name="pascheckbox[]" type="checkbox" value="{{$rcpipass_checkbox[$i]->value}}" id="flexCheckDefault" {{$rcpipass_checkbox[$i]->status ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckDefault">
            {{$rcpipass_checkbox[$i]->value}}
            </label>
            </div>
            
            @endfor
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="pasOtherAnalog"></textarea>
            </div>
            <p><b>Стадия проекта(выбрать из списка)</b></p>
            @for($i = 14; $i < 22; $i++)
            <div class="form-check mb-3">
            <input class="form-check-input" name="pascheckbox[]" type="checkbox" value="{{$rcpipass_checkbox[$i]->value}}" id="flexCheckDefault" {{$rcpipass_checkbox[$i]->status ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckDefault">
            {{$rcpipass_checkbox[$i]->value}}
            </label>
            </div>
            @endfor
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="pasAnotherStage"></textarea>
            </div>

            <p>Потенциальные потребители, организации, заинтересованные в результатах проекта(рынок сбыта) (не более 500 знаков)</p>   
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="pasRinokSbita">{{$rcpipass->first()->pasRinokSbita}}</textarea>
            </div>
            <p>Основные конкурентные преимущества(не более 500 знаков)</p>   
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="pasGeneralPer">{{$rcpipass->first()->pasGeneralPer}}</textarea>
            </div>
            <p><b>Использование объектов интеллектуальной собственности (потенциальных объектов интеллектуальной собственности)</b></p>
            <!-- Checkbox 1 !-->
            @for($i =23; $i < 26; $i++)
            <div class="form-check mb-3">
            <input class="form-check-input" name="pascheckbox[]" type="checkbox" value="{{$rcpipass_checkbox[$i]->value}}" id="flexCheckDefault" {{$rcpipass_checkbox[$i]->status ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckDefault">
            {{$rcpipass_checkbox[$i]->value}}
            </label>
            </div>
            @endfor
            <p>Пояснение</p>   
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="pasDescription">{{$rcpipass->first()->pasDescription}}</textarea>
            </div>
            <p>Сроки реализации проекта</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="pasRealizationTemp" value="{{$rcpipass->first()->pasRealizationTemp}}">
            </div>
            <p><b>Согласие на получение денежных средств в целях коммерциализации проекта (сертификата)</b></p>
            @for($i = 26; $i < 28; $i++)
            <div class="form-check mb-3">
            <input class="form-check-input" name="pascheckbox[]" type="checkbox" value="{{$rcpipass_checkbox[$i]->value}}" id="flexCheckDefault" {{$rcpipass_checkbox[$i]->status ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckDefault">
            {{$rcpipass_checkbox[$i]->value}}
            </label>
            </div>
            @endfor
            <p>В случае согласия, указать продукт, полученный в результате реализации проекта (объект коммерциализации):</p>   
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="pasObjectComerc">{{$rcpipass->first()->pasObjectComerc}}</textarea>
            </div>
            <p>Достижения по проекту(публикации по теме проекта, акты внедрения, дипломы, награды и пр.)</p>   
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="pasDoztizhProject">{{$rcpipass->first()->pasDoztizhProject}}</textarea>
            </div>
            <p>Дополнительная информация</p>   
            <div class="form-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="pasDopInformation">{{$rcpipass->first()->pasDopInformation}}</textarea>
            </div>
                </div>
  
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-danger w-100 fs-6">Сохранить</button>
                </div>
                
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6" style="width:20px;">Назад</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        window.onload = function() {
 openPart(1);
}
        function openPart(partNumber) {
 // Здесь ваш код для открытия части заявки
 // partNumber - это номер части заявки, которую вы хотите открыть

 // Делаем все кнопки неактивными
 var buttons = document.querySelectorAll('.nav-item button');
 for (var i = 0; i < buttons.length; i++) {
     buttons[i].classList.remove('active');
 }

 // Делаем кнопку активной
 var activeButton = document.querySelector('.nav-item button[data-part="' + partNumber + '"]');
 activeButton.classList.add('active');

 // Делаем все div-ы неактивными
 var divs = document.querySelectorAll('.part');
 for (var i = 0; i < divs.length; i++) {
     divs[i].style.display = 'none';
 }

 // Делаем div активным
 var activeDiv = document.querySelector('.part[data-part="' + partNumber + '"]');
 activeDiv.style.display = 'block';
}
    </script>
</body>
</html>