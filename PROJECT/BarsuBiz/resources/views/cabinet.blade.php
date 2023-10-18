<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Cabinet</title>
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

</head>
<body>
    <script src="assets/js/main.js"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container d-flex">
          <a class="navbar-brand" href="#">BarsuBiz</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Главная</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Личный кабинет</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Мои документы</a>
              </li>
            </ul>
            <form method="post" action="{{ route('logout') }}" class="ms-auto">
              @csrf
            <button type="submit" class="btn btn-outline-danger">Выйти</button>
            </form>
          </div>
        </div>
      </nav>
      @auth
      <div class="container">
        

        <div class="row">
            <div class="col-md-8">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="true">Файлы</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="files" role="tabpanel" aria-labelledby="files-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Файл</th>
                                    <th>Владелец</th>
                                    <th>Дата получения</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>file1.pdf</td>
                                    <td>Пользователь123</td>
                                    <td>2023-10-18</td>
                                </tr>
                                <tr>
                                    <td>file2.jpg</td>
                                    <td>Пользователь123</td>
                                    <td>2023-10-19</td>
                                </tr>
                                <!-- Здесь можно добавить другие файлы -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
              <h1>Личный кабинет</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Информация о пользователе</h5>
                        <p><strong>Username:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <h1>Пожалуйста, войдите в систему<h1>.
    @endauth
      <!--Js fiels-->

</body>
</html>