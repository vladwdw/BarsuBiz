<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Составление шаблона</title>
    <style>
 
    body {
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap');
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
        
        <form class="col-md-6 right-box p-3 rounded-4 shadow box-area">
            <div class="row align-items-center ">
                <div class="header-text mb-4">
                    <h2 style="text-align: center;">Заполните данные на участие в конкурсном отборе НИР
                        в рамках системы внутренних грантов БарГУ 
                        </h2>
                </div>
                <p>Научное направление</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Научное направление ">
                </div>
                <p>Наименование темы научно-исследовательской работы</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Тема работы">
                </div>
                <p>Ф.И.О. руководителя и исполнителей НИР, должность (для студентов – курс, специальность, группа; научный руководитель)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:"></textarea>
                </div>
                <p>Срок реализации проекта</p>
                <div class="input-group mb-3" id="solutions1">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Срок реализации проекта">
                </div>
                <p>Контактные данные руководителя НИР (№ моб. тел., e-mail)</p>
                <div class="input-group mb-3" id="solutions1">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Контактные данные">
                </div>
                <p>Обоснование целесообразности и актуальности проведения научного исследования. Анализ состояния проблемного (исследуемого) вопроса в республике и за рубежом</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите информацию"></textarea>
                </div>
                <p>Цель и задачи НИР</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите информацию"></textarea>
                </div>
                <p>Элементы научной новизны планируемого исследования.</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите информацию"></textarea>
                </div>
                <p>Календарный план исследования.</p>
                <div class="Pokaz">
                    <div class="input-group mb-3 d-flex" id="solutions1">
                        <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" name="inputValue" value="1">
                        <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Наименование этапа работы">
                    </div>
                    
                    <div class="input-group mb-3 d-flex" id="solutions1">
                        <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Начало срока выполнения">
                        <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Окончание окончание срока выполнения">
                    </div>
                    <div class="input-group mb-3 d-flex" id="solutions1">
                        <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Конкретные планируемые результаты">
                    </div>
                </div>
                <div class="container-fluid  mb-3 ">
                    <button class="btn btn-lg btn-danger fs-6" onclick="addNewElement(); return false;">Добавить поле</button>
                    <button class="btn btn-lg btn-outline-danger fs-6" onclick="RemoveElement(); RemoveElement(); RemoveElement();return false;">Удалить поле</button>
                </div>
                <p>Ожидаемые результаты по итогам проведения НИР (социальные, экономические, другие выгоды; научная значимость полученных результатов).</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите информацию"></textarea>
                </div>
                <p>Практическая значимость результатов НИР, область (области) их применения, форма (формы) внедрения. </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите информацию"></textarea>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-danger w-100 fs-6">Отправить</button>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6" style="width:20px;">Что-то делается</button>
                </div>
            </div>
        </form>
    </div>
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
  input1.name="inputValue"
  var inputs=document.getElementsByName("inputValue");
  input1.value = Number(inputs[inputs.length - 1].value)+1;
  
  
  // Создание нового input с классом "form-control form-control-lg bg-light fs-6 mb-2" и плейсхолдером "Наименование этапа работы"
  var input2 = document.createElement("input");
  input2.type = "text";
  input2.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input2.placeholder = "Наименование этапа работы";
  
  // Добавление input1 и input2 в новый div
  newDiv.appendChild(input1);
  newDiv.appendChild(input2);
  
  // Создание нового p с классом "text-center" и текстом "Срок выполнения."
  var p = document.createElement("p");
  p.className = "text";
  p.textContent = "Срок выполнения.";
  
  // Добавление p в новый div
  newDiv1.appendChild(p);
  
  // Создание нового div с классом "input-group mb-3 d-flex"
  var innerDiv1 = document.createElement("div");
  innerDiv1.className = "input-group mb-3 d-flex";
  
  // Создание нового input с классом "form-control form-control-lg bg-light fs-6 mb-2" и плейсхолдером "Начало"
  var input3 = document.createElement("input");
  input3.type = "text";
  input3.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input3.placeholder = "Начало";
  
  // Создание нового input с классом "form-control form-control-lg bg-light fs-6 mb-2" и плейсхолдером "Окончание"
  var input4 = document.createElement("input");
  input4.type = "text";
  input4.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input4.placeholder = "Окончание";
  
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
  input5.type = "text";
  input5.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input5.placeholder = "Конкретные планируемые результаты";
  
  // Добавление input5 во внутренний div
  innerDiv2.appendChild(input5);
  
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
  if (созданныеЭлементы.length > 3) {
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