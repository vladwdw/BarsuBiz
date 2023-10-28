<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Cabinet</title>
    
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

      <h1 class="logo"><a href="#hero">BarsuBiz</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Дом</a></li>
          <li><a class="nav-link scrollto" href="#about">О нас</a></li>
          <li><a class="nav-link scrollto" href="#services">Наши сервиси</a></li>
          <li><a class="nav-link scrollto" href="#team">Разработчики</a></li>
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
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="true">Файлы</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                  
                    <div class="tab-paneshow active" id="files" role="tabpanel" aria-labelledby="files-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Файл</th>
                                    <th>Владелец</th>
                                    <th>Дата получения</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($molInics as $molInic)
    <tr>
        <td> <a href="{{ route('form11', $molInic->id, [$molInic->id]) }}">{{$molInic->name}}</a> </td>
        <td>{{ Auth::user()->name }}</td>
        <td>{{ $molInic->getAttribute('created_at') }}</td>
    </tr>
@endforeach

                                <!-- Здесь можно добавить другие файлы -->
                                
                            </tbody>
                        </table>
                    </div>
                    
                    {{$molInics->links('vendor.pagination.bootstrap-4')}}
                </div>
                
            </div>
            
            
        </div>
    </div>
      <!--Js fiels-->

</body>
</html>