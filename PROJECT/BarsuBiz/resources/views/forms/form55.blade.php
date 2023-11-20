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
        <ul class="nav justify-content-center">
  <li class="nav-item mt-2 mb-2">
    
  <button id="hideButtonApplication" type="button"  data-part="1" onclick="openPart(1)" class="btn btn-outline-danger rounded-4" ><i class="bi bi-file-earmark-text"></i> Заявка</button>
  
  </li>
  <li class="nav-item mt-2">
  <button id="hideButtonCalculate" type="button" data-part="2" onclick="openPart(2)" class="btn btn-outline-danger rounded-4" href="#"><i class="bi bi-calculator-fill"></i> Калькуляция</button>
  </li>
  <li class="nav-item mt-2">
  <button id="hideButtonObosn" type="button" data-part="3" onclick="openPart(3)" class="btn btn-outline-danger rounded-4" href="#"><i class="bi bi-aspect-ratio"></i> Обоснование</button>
  </li>
</ul>
<div id="direction" class="part p-1" data-part="1" style="display: none;">
        <div class="row align-items-center ">
                <div class="header-text mb-4">
                <h3 style="text-align: center;"><strong>ЗАЯВКА </strong></h3>
                    <h4 style="text-align: center;"> на получение гранта
                            </h4>
                </div>
                
                <p>Научное направление</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="sienceDirection" value="{{$grant->sienceDirection}}">
                </div>
                <p>Фамилия, собственное имя, отчество соискателя гранта</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="fioGrad" value="{{$grant->fioGrad}}">
                </div>
              
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
                </div>
</div>
                <div class="part p-3" data-part="3" style="display: none;">
        <div class="row align-items-center ">
                <div class="header-text mb-4">
                <h3 style="text-align: center;"><strong>Обоснование</strong></h3>
                 
                </div>
                <p>Цель научно-исследовательской работы, ее актуальность</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="goal" value="{{$grant_obosn->first()->goal}}">
                </div>
                <p>Научная идея </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="idea" value="{{$grant_obosn->first()->idea}}">
                </div>
              
                <p>Структура и методы исследования  </p>
                <div class="input-group mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="struct">{{$grant_obosn->first()->struct}}</textarea>
                </div>
                <p>Состояние рассматриваемой проблемы с учетом достижений современной науки</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="state">{{$grant_obosn->first()->state}}</textarea>
                </div>
                <p>Основные результаты исследования, их научная и практическая значимость, экономическая и социальная ценность</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="rezults">{{$grant_obosn->first()->rezults}}</textarea>
                </div>
                <p>Возможные области использования результатов исследования</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="field">{{$grant_obosn->first()->field}}</textarea>
                </div>
                <p>Сведения об участии соискателя гранта в научных исследованиях в данной области исследований и принципиальное отличие данной научно-исследовательской работы</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные" name="info">{{$grant_obosn->first()->info}}</textarea>
                </div>
         </div>
                </div>
            
           
        <div class="part p-2" data-part="2" style="display: none;">
        <div class="row align-items-center ">
                <div class="header-text mb-4">
                <h3 style="text-align: center;"><strong>Калькуляция</strong></h3>
                 
                </div>
                <p>Заработная плата</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="pay" value="{{$grant_calculate->first()->pay}}">
                </div>
                <p>Начисления на заработную плату в том числе:
                – отчисления в фонд социальной защиты населения
                – страховые взносы от несчастных случаев
                </p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="accruals" value="{{$grant_calculate->first()->accruals}}">
                </div>
                <p>Материалы</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="materials" value="{{$grant_calculate->first()->materials}}">
                </div>
                <p>Командировки (в пределах стран СНГ)</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="business" value="{{$grant_calculate->first()->business}}">
                </div>
                <p>Накладные расходы (не более 10% от оплаты труда)</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="invoices" value="{{$grant_calculate->first()->invoices}}">
                </div>
                <p>Прочие расходы</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные"  id="p" name="costs" value="{{$grant_calculate->first()->costs}}">
                </div>
              
             
               
        
                </div>   
                </div>
            
            <div class="input-group mb-3">
                    <button class="btn btn-lg btn-danger w-100 fs-6" type="submit">Сохранить</button>
                </div>
                
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6" style="width:20px;">Вернуться назад</button>
                </div>
        
        </form>
    </div>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script>
        window.onload = function() {
 openPart(1);
}
        function openPart(partNumber) {
 // Здесь ваш код для открытия части заявки
 // partNumber - это номер части заявки, которую вы хотите открыть

 // Делаем все кнопки неактивными
 var buttons = document.querySelectorAll('.nav-item button');
 for (var i = 0; i < buttons.length; i++) {
     buttons[i].classList.remove('active');
 }

 // Делаем кнопку активной
 var activeButton = document.querySelector('.nav-item button[data-part="' + partNumber + '"]');
 activeButton.classList.add('active');

 // Делаем все div-ы неактивными
 var divs = document.querySelectorAll('.part');
 for (var i = 0; i < divs.length; i++) {
     divs[i].style.display = 'none';
 }

 // Делаем div активным
 var activeDiv = document.querySelector('.part[data-part="' + partNumber + '"]');
 activeDiv.style.display = 'block';
}



    </script>
</body>
</html>