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
    <script src="{{asset('assets/js/jquery.js')}}"></script>
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
        
        <form class="col-md-6 right-box p-3 rounded-4 shadow box-area" method="post" action="/submit-form4">
            @csrf
            <div class="mb-5 ms-auto">
                <img src="assets/img/logo.png" class="logo" width="210px">
        </div>
        <ul class="nav justify-content-center">
  <li class="nav-item mt-2 mb-2">
    
  <button id="hideButtonApplication" type="button"  data-part="1" onclick="openPart(1)" class="btn btn-outline-danger rounded-4" ><i class="bi bi-file-earmark-text"></i> Заявка</button>
  
  </li>
  <li class="nav-item px-3 mt-2">
  <button id="hideButtonPlan" type="button" data-part="2" onclick="openPart(2)" class="btn btn-outline-danger rounded-4" href="#"><i class="bi bi-calendar-check"></i> Календарный план</button>
  </li>
  <li class="nav-item mt-2">
  <button id="hideButtonCalculate" type="button" data-part="3" onclick="openPart(3)" class="btn btn-outline-danger rounded-4" href="#"><i class="bi bi-calculator-fill"></i> Калькуляция</button>
  </li>
  <li class="nav-item mt-2">
  <button id="hideButtonObosn" type="button" data-part="4" onclick="openPart(4)" class="btn btn-outline-danger rounded-4" href="#"><i class="bi bi-aspect-ratio"></i> Обоснование</button>
  </li>
</ul>
        <div class="part p-1" data-part="1" style="display: none;">
            <div class="row align-items-center maa ">
                <div class="header-text mb-4">
                <h3 style="text-align: center;"><strong>ЗАЯВКА </strong></h3>
                    <h4 style="text-align: center;"> на конкурс проектов заданий ГПНИ 
                            </h4>
                </div>
                <p><strong>№ заявки,дата поступления, год прохождения</strong></p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="№" name="number">
                    <input type="date" class="form-control form-control-lg bg-light fs-6" placeholder="Дата" name="data" >
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Год" name="year">
                </div>
                <p>Приоритетное направление научных исследований Республики Беларусь, которому соответствует заявляемый проект НИР</p>
                <div class="input-group mb-3">
                    <input type="text"  class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные " name="sinceDir">
                </div>
                <p>Название проекта задания, краткое наименование программы (в соответствии с Перечнем государственных программ научных исследований на 2021-2025 гг.)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Название проекта задания" name="nameN"></textarea>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Краткое наименование программы" name="nameP"></textarea>
                </div>
                <p>Организации-заявители с указанием ведомственной принадлежности (указать для каждой организации) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="orgZav"></textarea>
                </div>
                <h4>Руководители проекта (указать сведения для каждого руководителя)</h4>
                <div class="Pokaz">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Ф.И.О" name="fio[]">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Ученая степень" name="uchStep[]">
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Ученое звание" name="uchZav[]">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Кафедра, лаборатория" name="kafLab[]">
                </div>
                <div class="input-group mb-3">
                    <input type="number"  class="form-control form-control-lg bg-light fs-6" placeholder="Телефон служебный" name="phone[]">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="E-mail" name="email[]">
                </div>
            </div>
                <div class="container-fluid  mb-3 ">
                    <button class="btn btn-lg btn-danger fs-6" onclick="addNewElement(); return false;">Добавить поле</button>
                    <button class="btn btn-lg btn-outline-danger fs-6" onclick="RemoveElement(); RemoveElement(); RemoveElement();return false;">Удалить поле</button>
                </div>
                <p>Плановые сроки выполнения</p>
                <div class="input-group mb-3">
                    <input type="date" class="form-control form-control-lg bg-light fs-6" placeholder="Начало" name="nach">
                    <input type="date" class="form-control form-control-lg bg-light fs-6" placeholder="Окончание" name="end">
                </div>
                <p><strong>Сметная стоимость работ</strong>(в .руб)</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего" name="allCost">
                </div>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Из них привлеченное внебюджетное финансирование" name="fin1">
                </div>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="В том числе на первый год  " name="fin2">
                </div>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Из них привлеченное внебюджетное финансирование " name="fin3">
                </div>
                
                
            </div>
        </div>
        <div class="part p-3" data-part="3" style="display: none;">
            <div class="row align-items-center maa ">
                <div class="header-text mb-4">
                <h3 style="text-align: center;"><strong>Калькуляция </strong></h3>
                    
                </div>
                <p>Материалы, покупные полуфабрикаты и комплектующие изделия</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate1">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate1">
                </div> 
                <p>Заработная плата научно-производственного персонала</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate2">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate2">
                </div> 
                <p>Отчисления в Фонд социальной защиты населения (34%) и другие отчисления в соответствии с дей-ствующим законодательством (Белгосстрах – 0,1 %)</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate3">
                </div> 
                <p>Научно-производственные командировки</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate4">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate4">
                </div> 
                <p>Работы и услуги сторонних организаций</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate5">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate5">
                </div> 
                <p>Прочие прямые расходы</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate6">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate6">
                </div> 
                <p>Накладные расходы</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate7">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate7">
                </div> 
                <p>Привлеченное внебюджетное финансирование</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Всего по проекту" name="totalCalculate8">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="На первый год" name="firstCalculate8">
                </div> 
            </div>
        </div>
        <div class="part p-2" data-part="2" style="display: none;">
            <div class="row align-items-center maa ">
                <div class="header-text mb-4">
                <h3 style="text-align: center;"><strong>КАЛЕНДАРНЫЙ  ПЛАН </strong></h3>
                    
                </div>
                <p>Научное направление</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные " name="direction">
                </div>
                <p>Проведения научно-исследовательской работы </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="Carryingout"></textarea>
                </div>
                <p>Наименование научно-исследовательской работы в целом</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="nameingeneral"></textarea>
                </div>
                <p>Плановые сроки выполнения</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Начало(год)" name="nachPlanneddates">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Окончание(год)" name="endPlanneddates">
                </div> 
                <p>Общая стоимость</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="totalcost">
                </div>
                <p>Ожидаемые научные результаты и форма отчетности</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="results"></textarea>
                </div>
                <h4>1 полугодие</h4>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Наименование:" name="name1p"></textarea>
                </div>
                
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Начало(год)" name="nachPlanneddates1p">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Окончание(год)" name="endPlanneddates1p">
                </div> 
                
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Общая стоимость" name="totalcost1p">
                </div>
                
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ожидаемые научные результаты" name="results1p"></textarea>
                </div>
                <h4>2 полугодие</h4>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Наименование" name="name2p"></textarea>
                </div>
               
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Начало(год)" name="nachPlanneddates2p">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Окончание(год)" name="endPlanneddates2p">
                </div> 
                
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Общая стоимость" name="totalcost2p">
                </div>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ожидаемые научные результаты" name="results2p"></textarea>
                </div>

            </div>
        </div>
        <div class="part p-4" data-part="4" style="display: none;">
            <div class="row align-items-center maa ">
                <div class="header-text mb-4">
                <h3 style="text-align: center;"><strong>ОБОСНОВАНИЕ </strong></h3>
                    
                </div>
                <p>1.1. Наименование и предлагаемые сроки выполнения НИР; наименование организации-исполнителя НИР и ее ведомственная подчиненность; предполагаемый научный руководитель НИР с указанием должности, ученой степени. </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="name_nir"></textarea>
                </div>
            
                <p>1.2. Цель и задачи работы; соответствие НИР одному из приоритетных направлений научных исследований Республики Беларусь на 2021-2025 годы.</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="goals_nir"></textarea>
                </div>
                <p>1.3. Актуальность решаемой проблемы; научная новизна предлагаемой НИР.</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="relevance_nir"></textarea>
                </div>
                <p>1.4. Важнейшие результаты предыдущих исследований по теме НИР; ссылки на три наиболее важные научные статьи, опубликованные за последние три года авторами проекта по тематике планируемых исследований (с указанием, по возможности, импакт-фактора журнала, в котором опубликована работа); имеющаяся в наличии научно-исследовательская база, квалификационный уровень и количественный состав предполагаемых исполнителей НИР.</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="results_nir"></textarea>
                </div>
                <p>1.5. Планируемые результаты выполнения НИР.</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="plan_results_nir"></textarea>
                </div>
                <p>1.6. Прогнозный объем финансирования из средств государственного бюджета в тысячах рублей на весь период выполнения НИР и, в том числе, на первый год; прогнозный объем привлеченных внебюджетных средств с указанием источников (на весь период, в том числе, на первый год).</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="volume_nir"></textarea>
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
<!-- <script>
    
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
</script> -->
    <script>
        function addNewElement() {
     // Создание нового div с классом "input-group mb-3 d-flex"
     
     var pokazDiv = document.querySelector(".Pokaz");
  var newDiv = document.createElement("div");
  newDiv.className = "input-group mb-3 d-flex";
  var newDiv1=document.createElement("div");
            newDiv1.className="text-center koi";
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
  newDiv.appendChild(innerDiv1);
  
  // Создание нового div с классом "input-group mb-3 d-flex"
  var innerDiv2 = document.createElement("div");
  innerDiv2.className = "input-group mb-3 d-flex";
  
  // Создание нового input с классом "form-control form-control-lg bg-light fs-6 mb-2" и плейсхолдером "Конкретные планируемые результаты"
  var input5 = document.createElement("input");
  input5.type = "number";
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
  newDiv.appendChild(innerDiv2);
  
  // Получение div с классом "Pokaz"
  
  
  // Добавление нового div в div с классом "Pokaz"
  pokazDiv.appendChild(newDiv);


}
function RemoveElement(element) {
  // Находим родительский элемент и удаляем переданный элемент из него
  var созданныеЭлементы = document.querySelectorAll(".input-group.mb-3.d-flex");

  // Проверяем, есть ли элементы для удаления
  if (созданныеЭлементы.length > 0) {
    // Получаем последний созданный элемент
    var последнийЭлемент = созданныеЭлементы[созданныеЭлементы.length - 1];

    // Находим родительский элемент и удаляем последний элемент из него

    var родительскийЭлемент = последнийЭлемент.parentElement;
    родительскийЭлемент.removeChild(последнийЭлемент);

  }
  return false;
}
    </script>
</body>
</html>