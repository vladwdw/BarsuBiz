<!DOCTYPE html>
<html lang="en">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/mainstyle1.css') }}" rel="stylesheet">
<head>

    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <title>Составление шаблона</title>
    
</head>
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
<body>
    
    <!--Main container-->

    <div class="container d-flex justify-content-center align-items-center min-vh-100 p-4">
        
        <form method="post" class="col-md-6 right-box p-3 rounded-4 shadow box-area" action="" enctype="multipart/form-data">
        @csrf
            <div class="row align-items-center ">
                <div class="header-text mb-4">
                    <h2 style="text-align: center;">Заполните данные для проекта молодежных инициатив</h2>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Наименование проекта" name="projectName" value="{{$molInic->nameProject}}">
                </div>
                <p>Место реализации проекта</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Наименование района" name="regionName" value="{{$molInic->nameRegion}}">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Населенный пункт" name="locality" value="{{$molInic->namePunct}}">
                </div>
                <p>Описание проекта</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Описание проблемы, на решение которой направлен проект:" name="description">{{$molInic->descriptionProblem}}</textarea>
                </div>
                <p>Результаты проекта (что будет достигнуто) в измеримых величинах:</p>
                <div class="Pokaz">
                @foreach($molIndic as $item)
                <div class="input-group mb-3 d-flex" id="solutions1">
                <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Показатель" name="indicator[]" value="{{$item->indicator}}">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Значение показателя" name="valueIndicator[]" value="{{$item->value}}">
                </div>
                @endforeach
                </div>
                <div class="container-fluid  mb-3 ">
                    <button class="btn btn-lg btn-danger fs-6" onclick="addNewElement(); return false;">Добавить поле</button>
                    <button class="btn btn-lg btn-outline-danger fs-6" onclick="RemoveElement(); return false;">Удалить поле</button>
                </div>
                <p>Срок реализации проекта</p>
                <div class="input-group mb-3" id="solutions1">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Срок реализации проекта" name="realizationTemp" value="{{$molInic->realizationTemp}}">
                </div>
                <p>Сведения об инициаторах:</p>
                <div class="input-group mb-3" id="solutions1">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="ФИО Руководителя(полностью): " name="fioRuk" value="{{$molInic->fioRuk}}">
                </div>
                <div class="input-group mb-3" id="solutions1">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Контактный телефон: " name="phone" value="{{$molInic->phone}}">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Email: " name="email" value="{{$molInic->email}}">
                </div>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Состав инициативной группы" name="sostav">{{$molInic->inicGroup}}</textarea>
                </div>
                <p>Дополнительная информация и комментарии:</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Доп инфа" name="dopInformation">{{$molInic->dopInformation}}</textarea>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-danger w-100 fs-6" type="submit">Сохранить</button>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6" style="width:20px;">Что-то делается</button>
                </div>
            </div>
        </form>
    </div>
    <?PHP
    for($i=0; $i<count($molIndic);$i++){
        echo '<script>addNewElement();</script>';

    }
    ?>
    <script>
        function addNewElement() {
    // Получаем количество уже существующих элементов с пронумерованными id
    var новыйЭлемент = document.createElement("div");
  новыйЭлемент.className = "input-group mb-3 d-flex";
  
  // Создаем два внутренних элемента input
  var input1 = document.createElement("input");
  input1.type = "text";
  input1.name="indicator[]";
  input1.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input1.placeholder = "Показатель";

  var input2 = document.createElement("input");
  input2.type = "text";
  input2.name="valueIndicator[]";
  input2.className = "form-control form-control-lg bg-light fs-6 mb-2";
  input2.placeholder = "Значение показателя";
  
  // Добавляем внутренние элементы в новый элемент
  новыйЭлемент.appendChild(input1);
  новыйЭлемент.appendChild(input2);
  
  // Находим элемент <div class="row align-items-center">
  var родительскийЭлемент = document.querySelector(".Pokaz");
  
  // Добавляем новый элемент в родительский элемент
  родительскийЭлемент.appendChild(новыйЭлемент);


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
}
    </script>
</body>
</html>