<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/formstyle.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Составление шаблона</title>
    <style>

  
    body {
        
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
        
        <form method="post" class="col-md-6 right-box p-3 rounded-4 shadow box-area"  method="post"action="{{ route('form55_update', ['name' => $grant->name,'id' => $grant->id]) }}">
        @csrf   
        <div class="mb-5 ms-auto">
                <img src="{{asset('assets/img/logo.png')}}" class="logo" width="210px">
        </div> 
        <div class="row align-items-center ">
                <div class="header-text mb-4">
                    <h2 style="text-align: center;">Заяка на получение гранта
                        </h2>
                </div>
                <p>Научное направление</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="sienceDirection" value="{{$grant->sienceDirection}}">
                </div>
                <p>Фамилия, собственное имя, отчество соискателя гранта</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="fioGrad" value="{{$grant->fioGrad}}">
                </div>
                <!--
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:"></textarea>
                </div>
                -->
                <p>Категория гранта </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="grandCategory" value="{{$grant->grandCategory}}">
                </div>
                <p>Наименование научно-исследовательской работы, представляемой на конкурс  </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="workName" value="{{$grant->workName}}">
                </div>
                <p>Тема диссертации соискателя гранта с указанием даты утверждения и сроков представления диссертации к предварительной экспертизе   </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="disertationTheme">{{$grant->disertationTheme}}</textarea>
                </div>
                <p>Наименование учреждения, в котором обучается соискатель гранта </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="uchrName" value="{{$grant->uchrName}}">
                </div>
                <p>Специальность, по которой обучается соискатель гранта  </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="special" value="{{$grant->special}}">
                </div>
                <p>Сведения о получении грантов   </p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="knowledge">{{$grant->knowledge}}</textarea>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-danger w-100 fs-6" type="submit">Сохранить</button>
                </div>
                
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6" style="width:20px;">Вернуться назад</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>