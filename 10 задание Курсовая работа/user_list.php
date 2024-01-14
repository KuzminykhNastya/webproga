<!DOCTYPE html> 
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
<div class="container2 mt-4 col-md-auto">
    <div class="container2 mt-4 col-md-auto">

        <h2>Регистрация</h2>
        <form action="register.php" method="post">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" placeholder="Введите имя" name="username" required>
            <label for="password">Пароль:</label>
            <input type="password" id="password" placeholder="Введите пароль" name="password" required> <br>
            <button class="btn btn-success" type="submit">Зарегистрироваться</button>
        </form>
      
    </div>
 
    <div class="container2 mt-4 col-md-auto">
        <h2>Авторизация</h2>
        <form class="reg_form" action="login.php" method="post">
            <label for="login_username">Имя пользователя:</label>
            <input class="form-control" type="text" placeholder="Введите логин" id="login_username" name="login_username" required>
            <br>
            <label for="login_password">Пароль:</label>
            <input class="form-control" type="password" placeholder="Введите пароль" id="login_password" name="login_password" required>
            <br>
            <button class="btn btn-success" type="submit">Войти</button>
        </form>
        
    </div>
</div>
</body>
</html>
