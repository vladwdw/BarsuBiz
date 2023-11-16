<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/formstyle.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Составление шаблона</title>
    <style>

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
        
        <form class="col-md-6 right-box p-3 rounded-4 shadow box-area" method="post"action="{{ route('form44_update', ['name' => $gpni->name,'id' => $gpni->id]) }}">
            @csrf
            <div class="mb-5 ms-auto">
                <img src="{{asset('assets/img/logo.png')}}" class="logo" width="210px">
        </div>
        <ul class="nav justify-content-center">
  <li class="nav-item mt-2 mb-2">
    
  <button id="hideButtonApplication" type="button"  class="btn btn-outline-danger rounded-4" ><i class="bi bi-file-earmark-text"></i> Заявка</button>
  
  </li>
  <li class="nav-item px-3 mt-2">
  <button id="hideButtonPlan" type="button" class="btn btn-outline-danger rounded-4" href="#"><i class="bi bi-clipboard2-data"></i> Календарный план</button>
  </li>
  <li class="nav-item mt-2">
  <button id="hideButtonCalculate" type="button" class="btn btn-outline-danger rounded-4" href="#"><i class="bi bi-calculator-fill"></i> Калькуляция</button>
  </li>
</ul>
        <div id="HideApplication">
            <div class="row align-items-center maa ">
                <div class="header-text mb-4">
                <h3 style="text-align: center;"><strong>ЗАЯВКА </strong></h3>
                    <h4 style="text-align: center;"> на конкурс проектов заданий ГПНИ 
                            </h4>
                </div>
                <p>Приоритетное направление научных исследований Республики Беларусь, которому соответствует заявляемый проект НИР</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Научное направление " name="sinceDir" value="{{$gpni->sincedir}}">
                </div>
                <p>Название проекта задания, краткое наименование программы (в соответствии с Перечнем государственных программ научных исследований на 2021-2025 гг.)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="namePr">{{$gpni->namePr}}</textarea>
                </div>
                <p>Организации-заявители с указанием ведомственной принадлежности (указать для каждой организации) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="orgZav">{{$gpni->orgZav}}</textarea>
                </div>
                <h4>Руководители проекта (указать сведения для каждого руководителя)</h4>
               
               
                <div class="inputs">
                @foreach($gpniDop as $item)
                <div class="Pokaz">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Ф.И.О" name="fio[]" value="{{$item->fio}}">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Ученая степень" name="uchStep[]" value="{{$item->uchStep}}">
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Ученое звание" name="uchZav[]" value="{{$item->uchZav}}">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Кафедра, лаборатория" name="kafLab[]" value="{{$item->kafLab}}">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Телефон служебный" name="phone[]" value="{{$item->phone}}">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="E-mail" name="email[]" value="{{$item->email}}">
                </div>
                </div>
                @endforeach
                </div>
                
            
                <div class="container-fluid  mb-3 ">
                    <button type="button" class="btn btn-lg btn-danger fs-6" onclick="addNewElement(); return false;">Добавить поле</button>
                    <button type="button" class="btn btn-lg btn-outline-danger fs-6" onclick="RemoveElement();">Удалить поле</button>
                </div>
                <p>Плановые сроки выполнения</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Начало" name="nach" value="{{$gpni->nach}}">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Окончание" name="end" value="{{$gpni->end}}">
                </div>
                <p><strong>Сметная стоимость работ</strong>(в .руб)</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Всего" name="allCost"  value="{{$gpni->allCost}}">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Из них привлеченное внебюджетное финансирование" name="fin1" value="{{$gpni->fin1}}">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="В том числе на первый год  " name="fin2" value="{{$gpni->fin2}}">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Из них привлеченное внебюджетное финансирование " name="fin3" value="{{$gpni->fin3}}">
                </div>
                
                
            </div>
        </div>
        <div id="HideCalculate">
            <div class="row align-items-center maa ">
                <div class="header-text mb-4">
                <h3 style="text-align: center;"><strong>Калькуляция </strong></h3>
                    
                </div>
                <p>Материалы, покупные полуфабрикаты и комплектующие изделия</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate1" value="{{$gpni_calculate->first()->totalCalculate1}}">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate1" value="{{$gpni_calculate->first()->firstCalculate1}}">
                </div> 
                <p>Заработная плата научно-производственного персонала</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate2" value="{{$gpni_calculate->first()->totalCalculate2}}">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate2" value="{{$gpni_calculate->first()->firstCalculate2}}">
                </div> 
                <p>Отчисления в Фонд социальной защиты населения (34%) и другие отчисления в соответствии с дей-ствующим законодательством (Белгосстрах – 0,1 %)</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate3" value="{{$gpni_calculate->first()->totalCalculate3}}">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate3" value="{{$gpni_calculate->first()->firstCalculate3}}">
                </div> 
                <p>Научно-производственные командировки</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate4" value="{{$gpni_calculate->first()->totalCalculate4}}">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate4" value="{{$gpni_calculate->first()->firstCalculate4}}">
                </div> 
                <p>Работы и услуги сторонних организаций</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate5" value="{{$gpni_calculate->first()->totalCalculate5}}">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate5" value="{{$gpni_calculate->first()->firstCalculate5}}">
                </div> 
                <p>Прочие прямые расходы</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate6" value="{{$gpni_calculate->first()->totalCalculate6}}">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate6" value="{{$gpni_calculate->first()->firstCalculate6}}">
                </div> 
                <p>Накладные расходы</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate7" value="{{$gpni_calculate->first()->totalCalculate7}}">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate7" value="{{$gpni_calculate->first()->firstCalculate7}}">
                </div> 
                <p>Привлеченное внебюджетное финансирование</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate8" value="{{$gpni_calculate->first()->totalCalculate8}}">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate8" value="{{$gpni_calculate->first()->firstCalculate8}}">
                </div> 
            </div>
        </div>
        <div id="HidePlan">
            <div class="row align-items-center maa ">
                <div class="header-text mb-4">
                <h3 style="text-align: center;"><strong>КАЛЕНДАРНЫЙ  ПЛАН </strong></h3>
                    
                </div>
               
                <p>Научное направление</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные " name="direction" value="{{$gpni_plan->first()->direction}}" >
                </div>
                <p>Проведения научно-исследовательской работы </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="Carryingout">{{$gpni_plan->first()->Carryingout}}</textarea>
                </div>
                <p>Наименование научно-исследовательской работы в целом</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="nameingeneral">{{$gpni_plan->first()->nameingeneral}}</textarea>
                </div>
                <p>Плановые сроки выполнения</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Начало(год)" name="nachPlanneddates" value="{{$gpni_plan->first()->nachPlanneddates}}">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Окончание(год)" name="endPlanneddates" value="{{$gpni_plan->first()->endPlanneddates}}">
                </div> 
                <p>Общая стоимость</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="totalcost" value="{{$gpni_plan->first()->totalcost}}">
                </div>
                <p>Ожидаемые научные результаты и форма отчетности</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="results">{{$gpni_plan->first()->results}}</textarea>
                </div>
                <h4>1 полугодие</h4>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Наименование:" name="name1p">{{$gpni_plan->first()->name1p}}</textarea>
                </div>
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Начало(год)" name="nachPlanneddates1p" value="{{$gpni_plan->first()->nachPlanneddates1p}}">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Окончание(год)" name="endPlanneddates1p" value="{{$gpni_plan->first()->endPlanneddates1p}}">
                </div> 
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Общая стоимость" name="totalcost1p" value="{{$gpni_plan->first()->totalcost1p}}">
                </div>
                
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ожидаемые научные результаты" name="results1p">{{$gpni_plan->first()->results1p}}</textarea>
                </div>
                <h4>2 полугодие</h4>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Наименование" name="name2p">{{$gpni_plan->first()->name2p}}</textarea>
                </div>
               
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Начало(год)" name="nachPlanneddates2p" value="{{$gpni_plan->first()->nachPlanneddates2p}}">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Окончание(год)" name="endPlanneddates2p" value="{{$gpni_plan->first()->endPlanneddates2p}}">
                </div> 
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Общая стоимость" name="totalcost2p" value="{{$gpni_plan->first()->totalcost2p}}">
                </div>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ожидаемые научные результаты" name="results2p">{{$gpni_plan->first()->results2p}}</textarea>
                </div>

            </div>
        </div>
            <div class="input-group mb-3">
                    <button class="btn btn-lg btn-danger w-100 fs-6" type="submit">Сохранить</button>
                </div>
                <div class="input-group mb-3">
                <a href="{{ route('back')}}" class="btn btn-lg btn-light w-100 fs-6" style="width:20px;">Назад</a>
                </div>
            </div>
        </form>
    </div>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script>
    
    $('#HideCalculate').hide();
   
    $('#HidePlan').hide();
 $('#hideButtonApplication').click(function() {
    if ($("#HideApplication").is(":hidden")) {
        $('#HideApplication').show();
        $('#HideCalculate').hide();
        $('#HidePlan').hide();
} 

 });
 $('#hideButtonCalculate').click(function() {
    if ($("#HideCalculate").is(":hidden")) {
        $('#HideApplication').hide();
        $('#HideCalculate').show();
        $('#HidePlan').hide();
 } 
 });
 $('#hideButtonPlan').click(function() {
    if ($("#HidePlan").is(":hidden")) {
        $('#HidePlan').show();
        $('#HideCalculate').hide();
        $('#HideApplication').hide();

 } 
 });
</script>
    <script>
        function addNewElement() {
     // Создание нового div с классом "input-group mb-3 d-flex"
     var PokazDiv1=document.querySelector(".inputs")
     var pokazDiv = document.createElement("div");
     pokazDiv.className="Pokaz";
  var newDiv = document.createElement("div");
  newDiv.className = "input-group mb-3 d-flex";
  // Создание нового input с классом "form-control form-control-lg bg-light fs-6 mb-2" и значением "1"
  var input1 = document.createElement("input");
  input1.type = "text";
  input1.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input1.name="fio[]";
  input1.placeholder="Ф.И.О. (полное) "
  
  
  // Создание нового input с классом "form-control form-control-lg bg-light fs-6 mb-2" и плейсхолдером "Наименование этапа работы"
  var input2 = document.createElement("input");
  input2.type = "text";
  input2.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input2.placeholder = "Ученая степень";
  input2.name="uchStep[]"
  
  // Добавление input1 и input2 в новый div
  newDiv.appendChild(input1);
  newDiv.appendChild(input2);
  
  // Создание нового p с классом "text-center" и текстом "Срок выполнения."

  
  // Создание нового div с классом "input-group mb-3 d-flex"
  var innerDiv1 = document.createElement("div");
  innerDiv1.className = "input-group mb-3 d-flex";
  
  // Создание нового input с классом "form-control form-control-lg bg-light fs-6 mb-2" и плейсхолдером "Начало"
  var input3 = document.createElement("input");
  input3.type = "text";
  input3.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input3.placeholder = "Ученое звание";
  input3.name="uchZav[]";
  
  // Создание нового input с классом "form-control form-control-lg bg-light fs-6 mb-2" и плейсхолдером "Окончание"
  var input4 = document.createElement("input");
  input4.type = "text";
  input4.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input4.placeholder = "Кафедра, лаборатория";
  input4.name="kafLab[]"
  
  // Добавление input3 и input4 во внутренний div
  innerDiv1.appendChild(input3);
  innerDiv1.appendChild(input4);
  
  // Добавление внутреннего div в новый div
  
  // Создание нового div с классом "input-group mb-3 d-flex"
  var innerDiv2 = document.createElement("div");
  innerDiv2.className = "input-group mb-3 d-flex";
  
  // Создание нового input с классом "form-control form-control-lg bg-light fs-6 mb-2" и плейсхолдером "Конкретные планируемые результаты"
  var input5 = document.createElement("input");
  input5.type = "text";
  input5.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input5.placeholder = "Телефон служебный";
  input5.name="phone[]";

  var input6 = document.createElement("input");
  input6.type = "text";
  input6.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input6.placeholder = "E-mail";
  input6.name="email[]";
  
  // Добавление input5 во внутренний div
  innerDiv2.appendChild(input5);
  innerDiv2.appendChild(input6);
  
  // Добавление внутреннего div в новый div

  
  // Получение div с классом "Pokaz"
  
  
  // Добавление нового div в div с классом "Pokaz"
  pokazDiv.appendChild(newDiv);
  pokazDiv.appendChild(innerDiv1);
  pokazDiv.appendChild(innerDiv2);
  PokazDiv1.appendChild(pokazDiv);
return false;


}
function RemoveElement(element) {
  // Находим родительский элемент и удаляем переданный элемент из него
  var созданныеЭлементы = document.querySelectorAll(".Pokaz");

  // Проверяем, есть ли элементы для удаления

    // Получаем последний созданный элемент
    if(созданныеЭлементы.length>1){
    var последнийЭлемент = созданныеЭлементы[созданныеЭлементы.length - 1];
    последнийЭлемент.remove()};


  return false;

}
window.addEventListener('load', function() {
    var element = document.querySelector('.input-group.mb-3');
  });
    </script>
</body>
</html>