<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    
    <!--  -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/mainstyle1.css') }}" rel="stylesheet">
  <link href="{{asset('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap')}}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i')}}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>
<body>

<header id="header">
    <div class="container-fluid d-flex align-items-center justify-content-between hh">

      <h1 class="logo"><a href="{{route('home')}}">BarsuBiz</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('home')}}">Дом</a></li>
          <li><a class="nav-link scrollto" href="#about">О нас</a></li>
          <li><a class="nav-link scrollto" href="#services">Наши сервисы</a></li>
          <!-- <li><a class="nav-link scrollto" href="#team">Разработчики</a></li> -->
          <li><a class="nav-link scrollto" href="#footer">Контакты</a></li>
          <li>
          <form method="post" action="{{ route('logout') }}">
            @csrf
            <button class="getstarted scrollto" type="submit">Выйти</button>
          </form>
           
          </li>
          <!-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
    <script src="assets/js/main.js"></script> 
    <script src="assets/js/main_cab.js"></script> 
    <!-- <nav class="navbar navbar-expand-lg bg-dark shadow">
        <div class="container d-flex">
          <a class="navbar-brand" href="#">BarsuBiz</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <form method="post" action="{{ route('logout') }}" class="ms-auto">
              @csrf
            <button type="submit" class="btn btn-outline-danger">Выйти</button>
            </form>
          </div>
        </div>
      </nav> -->
      
      <div class="container">
        
      
        <div class="row mt-3">
            <div class="col-md-5">
              <h1>Личный кабинет</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Информация о пользователе</h5>
                        <p><strong>Username:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-7">

            <select name="dropdown" id="list" class="form-control" aria-label="Default select example" onchange="tableSearch()">
    <option selected value="">Все</option>
    <option value="Молодежные инициативы">Молодежные инициативы</option>
    <option value="Участие в НИР">Участие в НИР</option>
</select>

<input type="hidden" id="selectedOption" value="">
                <div class="tab-content" id="myTabContent">
                  
                    <div class="tab-paneshow active" id="files" role="tabpanel" aria-labelledby="files-tab">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th >Файл</th>
                                    <!-- <th>Владелец</th> -->
                                    <th>Дата получения</th>
                                    <th>MS Word</th>
                                    <th>Adobe PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                           
                            
  @foreach($items as $item)                    
    <tr>
        <td> <a href="{{ route('form11', ['name' => $item->name,'id' => $item->id]) }}">{{$item->name}}</a> </td>
        <!-- <td>{{ Auth::user()->name }}</td> -->
        <td>{{ $item->getAttribute('created_at') }}</td>
        <td><a class="btn btn-outline-primary bi bi-file-earmark-word" type='submit' action="/submit-word"  ></a></td>
      <td><a class="btn btn-outline-warning bi bi-file-earmark-pdf"></a></td> 
        
    </tr>
    
@endforeach


                                <!-- Здесь можно добавить другие файлы -->
                                
                            </tbody>
                        </table>
                    </div>
                    
                    {{$items->links('vendor.pagination.bootstrap-4')}}
                </div>
                
            </div>
            
            
        </div>
    </div>
      <!--Js fiels-->
<script>
  document.getElementById("list").addEventListener("change", function () {
    var selectedFilter = this.value;
    localStorage.setItem("selectedFilter", selectedFilter);
    tableSearch();
});

// Применение сохраненного фильтра при загрузке страницы
window.addEventListener("load", function () {
    var selectedFilter = localStorage.getItem("selectedFilter");
    if (selectedFilter) {
        document.getElementById("list").value = selectedFilter;
        tableSearch();
    }
});
function tableSearch() {

var phrase = document.getElementById('list');

var table = document.getElementById('table');
var regPhrase = new RegExp(phrase.value, 'i');
var flag = false;

for (var i = 1; i < table.rows.length; i++) {
    flag = false;
    for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
        flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
        if (flag) break;
    }
    if (flag) {
        table.rows[i].style.display = "";
    } else {
        table.rows[i].style.display = "none";
    }

}
}
</script>
<footer id="footer" style="margin-top: 350px;" >
    <div class="footer-top ">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>BarsuBiz</h3>
              <p>
                <!-- A108 Adam Street -->
                 ИСТ-TEAM
                <br>
                БарГУ, Барановичи<br><br>
                <strong>Телефон:</strong> +375<br>
                <strong>Почта:</strong> barsubiz.support@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="telegram"><i class="bx bxl-telegram"></i></a>
                <a href="#" class="vk"><i class="bx bxl-vk"></i></a>
                <!-- <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
              </div>
            </div>
          </div>

          

          <div class="col-lg-3 col-md-6 footer-links" id="services">
            <h4>Сервисы</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('form1')}}">Проект молодежных инициатив</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('form2')}}">Конкурсный отбор НИР в рамках системы внутренних грантов БарГУ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('form1')}}">100 идей для Беларуси</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('form1')}}">Конкурс проектов заданий "ГПНИ"</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('form1')}}">Заявка на получение гранта</a></li>
            </ul>
          </div>

          <!-- <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div> -->

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>BarsuBiz</span></strong>. Все права защищены
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer>
</body>
</html>