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