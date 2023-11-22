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
  <title>Регистрация</title>
</head>
<body>
 <!--Main container-->

    <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <!--Left Box-->
       
        <!--Right Box Box-->
        <div class="col-md-6 right-box">
            
            <form class="row align-items-center " method="post" action="/submit_usr_php">
                @csrf
               
                <div class="header-text mb-4">
                    <h2>Здравствуйте, введите свое имя</h2>

                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Имя" name="name">
                </div>
               


                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-danger w-100 fs-6" type="submit">Отправить</button>
                </div>
               
         
                
</form>
        </div>
    </div>
 

</body>

</html>