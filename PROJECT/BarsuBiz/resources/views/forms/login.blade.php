<!DOCTYPE html>
<html lang="en">
<head>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->


  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/loginstyle.css')}}" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login page</title>
</head>
<body>
 <!--Main container-->
 <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <!--Left Box-->
        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #df3535;">
            <div class="featured-image mb-3">
                <img src="assets/img/features-1.png" class="img-fluid"alt="" style="width:250px;">
            </div>
        
        </div>
        <!--Right Box Box-->
        <div class="col-md-6 right-box">
            <form class="row align-items-center " method="post" action="{{ route('login') }}">
                @csrf
                <div class="header-text mb-4">
                    <h2>Добро пожалоавать на сайт</h2>
                    <p>Войдите пожалуйста</p>
                </div>
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email address" name="email">
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password">
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"name="" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Запомнить меня</small></label>
                    </div>
                    <div class="forgot">
                        <small><a href="#">Забыли пароль?</a></small>
                    </div>

                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-danger w-100 fs-6" type="submit">Войти</button>
                </div>
                <div class="input-group mb-3">
                    <a href="/register" class="btn btn-lg btn-light w-100 fs-6" style="width:20px;">Зарегестрироваться</a>
                </div>
        </form>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </div>
    </div>
 </div>
</body>
</html>