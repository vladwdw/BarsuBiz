<!DOCTYPE html>
<html lang="en">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/formstyle.css') }}" rel="stylesheet">
<link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
<head>

    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <title>Составление шаблона</title>
</head>
<style>
  
    body {
  font-family: 'Inter', 'sans-serif';
/* Замените 'путь_к_вашему_изображению.jpg' на путь к вашему фоновому изображению */
  background-size: cover; /* Растягивать фон до заполнения всего экрана */
  background-repeat: no-repeat; /* Не повторять фон */
  background-attachment: fixed; /* Фиксировать фон, чтобы он не двигался при прокрутке */
};
    </style>
<body>
    
    <!--Main container-->
    <!-- <header class="p-3 mb-3 border-bottom bg-transparent fixed-top">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> -->
        <!-- <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a> -->

        <!-- <ul class="nav col-12 col-lg-auto me-lg-auto mb-3 justify-content-center mb-md-0"> -->
          <!-- <li><a href="#" class="nav-link px-2 link-secondary">Сохранить</a></li> -->
          <!-- <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Дом</a></li>
          <li><a class="nav-link scrollto" href="#about">О нас</a></li>
          <li><a class="nav-link scrollto" href="#services">Наши сервисы</a></li>
          <!-- <li><a class="nav-link scrollto" href="#team">Разработчики</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#footer">Контакты</a></li>
          <li>
            <a class="getstarted scrollto" href="{{route('cabinet')}}">Кабинет</a>
           
          </li>
         <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav> -->
          <!-- <div class="col-md-5 text-end">
          <button type="button" class="btn btn-primary ">Сохранить</button>
           <button type="button" class="btn btn-outline-primary ">Кабинет</button>
          </div> -->
          <!-- <li><a href="#" class="nav-link px-2 link-dark">Вернуться на глвную</a></li> -->
         
        <!-- </ul> -->

        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div> -->
      <!-- </div>
    </div>
  </header> -->
  <div class="container-fluid fixed-top ">
  <div class="row">
    <form>
    <nav class="col-md-2 d-none d-md-block bg-transparent sidebar border-end border-light  min-vh-100">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
                
          <button type="button" class="btn btn-primary ">Сохранить</button>
          
         
          </li>
          <li class="nav-item">
           
            <button type="button" class="btn btn-outline-primary ">Кабинет</button>
          </li>
          <!-- Добавьте больше ссылок или другие элементы здесь -->
        </ul>
      </div>
    </nav>
</form>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <!-- Сюда вставьте основное содержимое страницы -->
    </main>
  </div>
</div>
  
    <div class="container d-flex justify-content-center align-items-center min-vh-100 p-4">
        
        <form method="post" class="col-md-6 right-box p-3 rounded-4 shadow box-area" action="/submit-form1" enctype="multipart/form-data">
        @csrf
       
        <div class="mb-5 ms-auto">
                <img src="assets/img/logo.png" class="logo" width="210px">
        </div>
            
            <div class="row align-items-center ">
                

                <div class="header-text mb-1">
                    <h3 style="text-align: center;"><strong>ЗАЯВКА </strong></h3>
                    <h4 style="text-align: center;"> на участие в конкурсе молодежных инициатив
                            </h4>
                </div>
                <p>Наименование проекта</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Наименование проекта" name="projectName">
                </div>
                <p>Место реализации проекта</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Наименование района" name="regionName">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Населенный пункт" name="locality">
                </div>
                <p>Описание проекта</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Описание проблемы, на решение которой направлен проект:" name="description"></textarea>
                </div>
                <p>Результаты проекта (что будет достигнуто) в измеримых величинах:</p>
                <div class="Pokaz">
                <div class="input-group mb-3 d-flex" id="solutions1">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Показатель" name="indicator[]">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Значение показателя" name="valueIndicator[]">
                </div>
                </div>
                <div class="container-fluid  mb-3 ">
                    <button class="btn btn-lg btn-danger fs-6" onclick="addNewElement(); return false;">Добавить поле</button>
                    <button class="btn btn-lg btn-outline-danger fs-6" onclick="RemoveElement(); return false;">Удалить поле</button>
                </div>
                <p>Срок реализации проекта</p>
                <div class="input-group mb-3" id="solutions1">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Срок реализации проекта" name="realizationTemp">
                </div>
                <p>Сведения об инициаторах:</p>
                <div class="input-group mb-3" id="solutions1">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="ФИО Руководителя(полностью): " name="fioRuk">
                </div>
                <div class="input-group mb-3" id="solutions1">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Контактный телефон: " name="phone">
                    <input type="text" class="form-control form-control-lg bg-light fs-6 mb-2" placeholder="Email: " name="email">
                </div>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Состав инициативной группы" name="sostav"></textarea>
                </div>
                <p>Дополнительная информация и комментарии:</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Доп инфа" name="dopInformation"></textarea>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-danger w-100 fs-6" type="submit">Отправить</button>
                </div>
                <div class="input-group mb-3">
                <a href="{{ route('back')}}" class="btn btn-lg btn-light w-100 fs-6" style="width:20px;">Назад</a>
                </div>
            </div>
        </form>
    </div>
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