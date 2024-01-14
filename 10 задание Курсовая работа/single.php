<!doctype html>
<html lang="ru">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>KinoObzor</title>
  </head>
  <body>
    <header class="container-fluid">
<div class="container">
<div class="row">
    <div class="col-4">
    <h1> <a href="/">KinoObzor</a></h1>
    </div>
    <nav class="col-8">
        <ul>
            <li><a href="idea.php">Главная</a></li>
            <li><?php
                session_start(); // начинаем сессию

                if (isset($_SESSION['user_id'])) {
                    // пользователь авторизован
                    echo '<a href="dashboard.php">Личный кабинет</a>';
                } else {
                    // пользователь не авторизован
                    echo '<a href="user_list.php">Войти</a>';
                }?>
            </li>
        </ul>
    </nav>
</div>
</div>
    </header>
    
    <div class="container">
        <div class="content row">
            <div class="main-content col-md-9 col-12">
                <h2>Ирония судьбы</h2>
                <div class="single_post row">
                    <div class="img col-12 ">
                        <img src="irsud.jpg" width="500" height="555" class="img-thumbnail">
                    </div>
                    <div class="info">
                        <i class="far fa-user"> Эльдар Рязанов</i>
                        <i class="far fa-calendar"> 1975</i>
                    </div>
                    <div class="single_post_text col-12">
                        <p class="prewiew_text "> 31 декабря Женя случайно попадает в чужую квартиру в Ленинграде. Главное новогоднее кино в России </p>
                    </div>
                </div>
                <a href="https://yandex.ru/video/preview/7800272029707196015">Смотреть</a>
            <div class="main-content col-md-3">
<br><br><br><br><br><br>
            </div>
        </div>
    </div>

  </body>
</html>