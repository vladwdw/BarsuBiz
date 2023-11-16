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
  <link href="{{asset('assets/css/card.css')}}" rel="stylesheet">
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <script src="{{asset('assets/js/jquery.js')}}"></script>

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
<style>
.small-font {
    font-size: 0.90rem; /* или любой другой размер, который вы считаете подходящим */
   }
   .sort{
    font-size: 0.85rem;
   }
    </style>

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
    @php
   $sort = $sort ?? 'new';
@endphp
      <div class="container">
        
      
        <div class="row mt-3">
            <!-- <div class="col-md-4">
              <h1>Личный кабинет</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Информация о пользователе</h5>
                        <p><strong>Имя пользователя:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Электронная почта:</strong> {{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div> -->
            <div class="col-md-4 col-xs-5 mb-5">
            <div class="card card-custom bg-white border-white border-0">
          <div class="card-custom-img" style="background-image: url(assets/img/vivi.jpg); font-family:'Poppins'; "></div>
          <div class="card-custom-avatar">
            <img class="img" src="assets/img/man.png" alt="Avatar" />
          </div>
          <div class="card-body">
           <form  class="col-md-15 right-box p-3 rounded-4 shadow box-area mb-3 " style="font-family:'Poppins';" > 
          <h5 class="card-title"><strong>Пользователь:</strong> {{ Auth::user()->name }}</h5>
          <h5 class="card-text  " ><strong>Почта:</strong> {{ Auth::user()->email }}</h5>
            <h5 class="card-text  "><strong>Статус:</strong>  @if(auth()->user()->Role == 'User') Пользователь @else Админ @endif</h5> 
          </form>
          </div>
        </div>
        <!-- Copy until here -->

      </div>
      <div class="col-md-8 col-xs-12 ">
      <div class="row mb-3">
<div class="col-5">
  <form method="get" action="{{route('search')}}">
<div class="input-group mb-3">
  @csrf
  <input type="hidden" name="type" value="search">
  <input type="text" name="searchItem" class="form-control rounded-start-2" placeholder="Поиск по ключевому слову" aria-label="Поиск по ключевому слову" aria-describedby="button-addon2">
  <button class="btn btn-outline-danger bi bi-search" type="submit"></button>
</form>
</div>
<div class="col-7">
<form id="sortForm" method="get" action="{{route('search')}}">
<input type="hidden" name="type" value="sort">
    <input type="hidden" name="sort" id="sortInput" value="{{ $sort ?? 'new' }}">
    <button class="btn btn-outline-danger bi bi-arrow-down-up sort" type="submit">{{ $sort === 'old' ? ' Сначала новые' : ' Сначала старые' }}</button>
</form>
</div>
</div>
<div class="col-7">
<select name="dropdown" id="list" class="form-control" aria-label="Default select example" onchange="tableSearch()">
<option selected value="">Все</option>
<option value="Молодежные инициативы">Молодежные инициативы</option>
<option value="Участие в НИР">Участие в НИР</option>
<option value="100 ИДЕЙ ДЛЯ БЕЛАРУСИ">100 ИДЕЙ ДЛЯ БЕЛАРУСИ</option>
<option value="ГПНИ">ГПНИ</option>
<option value="Заявка на получение гранта">Заявка на получение гранта</option>
<option value="РКИП">Республиканский конкурс инновационных проектов</option>
</select>
</div>


<input type="hidden" id="selectedOption" value="">
    <div class="tab-content" id="myTabContent">
      
        <div class="tab-paneshow active" id="files" role="tabpanel" aria-labelledby="files-tab">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th >Файл</th>
                        <!-- <th>Владелец</th> -->
                        <th>Дата создания</th>
                        @if(auth()->user()->Role == 'Admin')
                        <th>Создатель</th>
                        @endif
                        <th>MS Word</th>
                        <th>Adobe PDF</th>
                        <th>Удалить</th>
                    </tr>
                </thead>
                <tbody>
                
               
       
@foreach($items as $item)   

<tr>
<td name="itemName"> <a href="{{ route('form11', ['name' => $item->name,'id' => $item->id]) }}">{{$item->name}}_#{{$item->id}}</a> </td>
<!-- <td>{{ Auth::user()->name }}</td> -->
<td>{{ $item->getAttribute('created_at') }}</td>
@if(auth()->user()->Role == 'Admin')
<td name="owner">{{$item->owner}}</td>
@endif
<form method="post"  action="{{ route('form_word', ['name' => $item->name,'id' => $item->id]) }}" enctype="multipart/form-data">
@csrf
<td> 

<button class="btn btn-outline-primary bi bi-file-earmark-word" type='submit'  ></button></td>
</form>
<td><a href="{{ route('form_pdf', ['name' => $item->name,'id' => $item->id]) }}" class="btn btn-outline-warning bi bi-file-earmark-pdf"></a></td> 
<form method="post"  action="{{ route('form11_delete', ['name' => $item->name,'id' => $item->id]) }}" enctype="multipart/form-data">
@csrf
<td><button class="btn btn-outline-danger bi bi-trash3" type='submit'>
</button>
</td> 
</form>
</tr>

@endforeach
                    <!-- Здесь можно добавить другие файлы -->
                    
                </tbody>
            </table>
        </div>
        
        {{ $items->appends(['search' => request('search'), 'sort' => request('sort')])->links('vendor.pagination.bootstrap-4') }}
        @if(auth()->user()->Role == 'User')

    </div>
    <div class="position-fixed bottom-0 end-0">
    @foreach ($notifications as $notification)
    @if($notification->data['type']=='edit')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
   {{ $notification->data['message'] }}
   <button class="btn-close" onclick="markAsRead('{{ $notification->id }}')"  data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif($notification->data['type']=='delete')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
   {{ $notification->data['message'] }}
   <button class="btn-close" onclick="markAsRead('{{ $notification->id }}')"  data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@endforeach
@endif
</div>
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
$(document).ready(function() {
  $('td[name="owner"], td[name="itemName"]').each(function() {
  var text = $(this).text();
  if ((text.length > 5 && /[A-Z]/.test(text)) ||(text.length > 8) ) { // Замените 10 на максимальное количество символов, которое вы считаете приемлемым
    $(this).addClass('small-font');
  }
 });
});

function markAsRead(id) {
 $.ajax({
    url: '/mark-as-read',
    type: 'POST',
    data: {
        id: id,
        _token: '{{ csrf_token() }}'
    }
 }).done(function(response) {
    console.log(response.success);
 }).fail(function(jqXHR, textStatus, errorThrown) {
    console.error(textStatus, errorThrown);
 });
}
// Применение сохраненного фильтра при загрузке страницы
window.addEventListener("load", function () {
    var selectedFilter = localStorage.getItem("selectedFilter");
    if (selectedFilter) {
        document.getElementById("list").value = selectedFilter;
        tableSearch();
    }
});
document.getElementById('sortForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let sortInput = document.getElementById('sortInput');
    let sort = sortInput.value;
    sortInput.value = sort === 'old' ? 'new' : 'old';
    this.submit();
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

          

          <div class="col-lg-7 col-md-7 footer-links" id="services">
            <h4>Сервисы</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('form1')}}">Проект молодежных инициатив</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('form2')}}">Конкурсный отбор НИР в рамках системы внутренних грантов БарГУ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('form3')}}">100 идей для Беларуси</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('form4')}}">Конкурс проектов заданий "ГПНИ"</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('form5')}}">Заявка на получение гранта</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('form6')}}">Республиканский конкурс инновационных проектов</a></li>
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