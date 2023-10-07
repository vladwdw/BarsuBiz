<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/mainstyle.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Составление шаблона</title>
</head>
<body>
    <!--Main container-->
    <div class="container d-flex justify-content-center align-items-center min-vh-100 p-4">
        
        <form class="col-md-6 right-box p-3 rounded-4 shadow box-area">
            <div class="row align-items-center ">
                <div class="header-text mb-4">
                    <h2 style="text-align: center;">Заполните данные на участие 
                        в конкурсе проектов заданий ГПНИ "
                        </h2>
                </div>
                <p>Приоритетное направление научных исследований Республики Беларусь, которому соответствует заявляемый проект НИР</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Научное направление ">
                </div>
                <p>Название проекта задания, краткое наименование программы (в соответствии с Перечнем государственных программ научных исследований на 2021-2025 гг.)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:"></textarea>
                </div>
                <p>Организации-заявители с указанием ведомственной принадлежности (указать для каждой организации) </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:"></textarea>
                </div>
                <h4>Руководители проекта (указать сведения для каждого руководителя)</h4>
                <div class="Pokaz">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Ф.И.О">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Ученая степень">
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Ученое звание">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Кафедра, лаборатория">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Телефон служебный">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="E-mail">
                </div>
            </div>
                <div class="container-fluid  mb-3 ">
                    <button class="btn btn-lg btn-danger fs-6" onclick="addNewElement(); return false;">Добавить поле</button>
                    <button class="btn btn-lg btn-outline-danger fs-6" onclick="RemoveElement(); RemoveElement(); RemoveElement();return false;">Удалить поле</button>
                </div>
                <p>Плановые сроки выполнения</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Начало">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Окончание">
                </div>
                <p><strong>Сметная стоимость работ</strong>(в .руб)</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Всего">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Из них привлеченное внебюджетное финансирование">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="В том числе на первый год  ">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Из них привлеченное внебюджетное финансирование ">
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
  input1.name="inputValue";
  input1.placeholder="Ф.И.О. (полное) "
  
  
  // Создание нового input с классом "form-control form-control-lg bg-light fs-6 mb-2" и плейсхолдером "Наименование этапа работы"
  var input2 = document.createElement("input");
  input2.type = "text";
  input2.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input2.placeholder = "Ученая степень";
  
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
  
  // Создание нового input с классом "form-control form-control-lg bg-light fs-6 mb-2" и плейсхолдером "Окончание"
  var input4 = document.createElement("input");
  input4.type = "text";
  input4.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input4.placeholder = "Кафедра, лаборатория";
  
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
  input5.placeholder = "Телефон служебный";

  var input6 = document.createElement("input");
  input6.type = "text";
  input6.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input6.placeholder = "E-mail";
  
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