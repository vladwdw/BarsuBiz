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
        
        <form  method="post" action="/submit-form6" class="col-md-6 right-box p-3 rounded-4 shadow box-area">
            @csrf
            <div class="row align-items-center ">
                <div class="header-text mb-4">
                    <h2 style="text-align: center;">Заявка 
                        </h2>
                        <h3 style="text-align: center;">На участие в республиканском конкурсе инновационных проектов</h3>
                </div>
                <p>Название номинации</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="nominationName">
                </div>
                <p>Наименование инновационного проекта (далее – проект)</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="nameProject">
                </div>
                <!--
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:"></textarea>
                </div>
                -->
                <h4 style="text-align: center;">Физическое лицо или индивидуальный предприниматель</h4>
                <p>Фамилия, собственное имя, отчество (если таковое имеется) заявителя </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="fio">
                </div>
                <p>Место работы/учебы </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="teachWorkPlace">
                </div>
                <p>Должность служащего</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="dolzhnUch">
                </div>
                <p>Ученая степень/ученое звание </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="uchStep">
                </div>
                <p>Адрес места жительства или пребывания</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="adress">
                </div>
                <p>Контактный номер телефона</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="phone">
                </div>
                <p>Электронная почта</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="email">
                </div>
                <p>Ссылка на сайт проекта, группа в социальных сетях</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="projectLink">
                </div>
                <h4 style="text-align: center;">Юридическое лицо</h4>
                <p>Наименование (полное наименование юридического лица с указанием организационно-правовой формы)</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="yurName">
                </div>
                <p>Фамилия, собственное имя, отчество (если таковое имеется) руководителя </p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="fioRuk">
                </div>
                <p>Должность служащего</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="dolzhnYur">
                </div>
                <p>Ученая степень/ученое звание</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="yurStep">
                </div>
                <p>Юридический адрес/почтовый адрес</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="yurAdress">
                </div>
                <p>Учетный номер плательщика</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="platNumber">
                </div>
                <p>Контактный номер телефона</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="yurPhone">
                </div>
                <p>Электронная почта</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="yurEmail">
                </div>
                <p>Фамилия, собственное имя, отчество (если таковое имеется) членов команды проекта (при наличии)</p>
                <div class="form-group mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите данные:" name="fioCommand"></textarea>
                </div>
                <p>Ссылка на сайт проекта, группа в социальных сетях</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Введите данные" name="yurLink">
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-danger w-100 fs-6">Отправить</button>
                </div>
                
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6" style="width:20px;">Назад</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>