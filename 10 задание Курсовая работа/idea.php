<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mysite";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);
?>

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
                <li> <?php
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
<div class="container"></div>
<div class="row"><h2 class="slider-title">Новогоднее кино</h2></div>
</div>
    
    <div class="films">
        
            <div class="main-content col-12">
                <h2>Все фильмы</h2>
                <img src="гринч1.jpg" class="d-block w-100" >
                <ul>
            <?php 
                $sql = "SELECT * FROM films";
                $result = $conn->query($sql);
                ?>
            </ul>
            

            <table>
            <tr> 
                <!-- <th>Pic</th> -->
                <th>Название</th>
                <th>Дата выхода</th>
                <th>О фильме</th>
            </tr>

            <?php foreach($result as $row): ?>
                <tr> 
                    <!-- <td><?php echo $row['pic']; ?></td> -->
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['about']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table></div>
    </div>

    <div class="container">
        <div class="content row">
            <div class="main-content col-md-9 col-12">
                <h2>Рекомендуемые фильмы</h2>
                <div class="post row">
                    <div class="img col-12 col-md-4">
                        <img src="irsud.jpg" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            <a href="single.php">Ирония судьбы</a>
                        </h3>
                        <i > 1975</i>
                        <p class="prewiew_text "> 31 декабря пошли друзья в баню попариться, по традиции
                             смыть с себя все плохое, чтобы встретить Новый год чистыми,
                              а «напарились» до такой степени 
                            (пивом и водкой), что отправили в Ленинград не того.</p>
                    </div>
                </div>
                <div class="post row">
                    <div class="img col-12 col-md-4">
                        <img src="tarng.jpg" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            <a href="single2.php">Тариф новогодний</a>
                        </h3>
                        <i> 2008</i>
                        <p class="prewiew_text "> Андрей (Максим Матвеев), молодой парень, 
                            работающий переводчиком, в канун новогоднего праздника приезжает из 
                            Австрии домой и случайно — благодаря волшебному тарифу для сотового 
                            телефона — знакомится с девушкой по имени Алёна (Валерия Ланская), 
                            скрипачкой. Они пытаются встретиться, но неожиданно выясняют, что 
                            находятся в Москве… с разницей в год! Более того, Андрей вскоре узнаёт,
                             что Алёне суждено погибнуть в дорожной аварии. </p>
                    </div>
                </div>
            </div>
            <div class="main-content col-md-3">

            </div>
        </div>
    </div>
    
  </body>
</html>