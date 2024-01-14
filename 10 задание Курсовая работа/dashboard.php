


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
  <body >
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
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </div>
</div>
</header>

    <div class="container2 mt-9 col-md-auto">
        <h2>Привет!</h2>

        <h3>Хотите изменить свои данные?</h3> 
        <form action="edit_user.php" method="post">
            <input type="text" id="newUsername" placeholder="Введите новый логин" name="newUsername"><br>
            <input type="password" id="newPassword" placeholder="Введите новый пароль" name="newPassword"><br>
            <input type="submit" class="btn btn-success" value="Сохранить изменения">
    
            <a class="ah" href="logout.php">Выйти</a>
        </form>
    </div>

    <div>
    <script>
        function editUser(userId) {
            document.getElementById("edit_user_id").value = userId;
            document.getElementById("new_username").value = prompt("Введите новый логин:", "");
            document.getElementById("new_password").value = prompt("Введите новый пароль:", "");

            document.forms[0].submit();
        }
        
        function editFilm(filmId) {
            document.getElementById("edit_film_id").value = filmId;
            document.getElementById("new_name").value = prompt("Введите новое название:", "");
            document.getElementById("new_date").value = prompt("Введите новую дату:", "");
            document.getElementById("new_about").value = prompt("Введите новое описание:", "");
            document.forms[0].submit();
            
        }


        function confirmDelete(user_id) {
            var confirmDelete = confirm("Удалить пользователя?");
            if (confirmDelete) {
    
                var deleteForm = document.createElement("form");
                deleteForm.method = "post";
                deleteForm.action = "delete_user.php";

                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "user_id";
                input.value = user_id;

                deleteForm.appendChild(input);
                document.body.appendChild(deleteForm);
                deleteForm.submit();
            }
        }

        function showAddUserForm() {
           
            var username = prompt("Введите новый логин:", "");
            var password = prompt("Введите новый пароль:", "");

          
            var addUserForm = document.createElement("form");
            addUserForm.method = "post";
            addUserForm.action = "add_user.php";

            var usernameInput = document.createElement("input");
            usernameInput.type = "text";
            usernameInput.name = "username";
            usernameInput.value = username;

            var passwordInput = document.createElement("input");
            passwordInput.type = "password";
            passwordInput.name = "new_password";
            passwordInput.value = password;

            var addButton = document.createElement("button");
            addButton.type = "submit";
            addButton.textContent = "Add User";

            addUserForm.appendChild(usernameInput);
            addUserForm.appendChild(passwordInput);
            addUserForm.appendChild(addButton);

            document.body.appendChild(addUserForm);
            addUserForm.submit();
        }
            
        function confirmDeletef(filmsId) {
            var confirmDeletef = confirm("Удалить фильм?");
            if (confirmDeletef) {
    
                var deleteForm = document.createElement("form");
                deleteForm.method = "post";
                deleteForm.action = "delete_film.php";

                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "films_id";
                input.value = filmsId;

                deleteForm.appendChild(input);
                document.body.appendChild(deleteForm);
                deleteForm.submit();
            }
        }

        function showAddFilmsForm() {
           
            var name = prompt("Введите новое название:", "");
            var date = prompt("Введите новую дату:", "");
            var about = prompt("Введите новое описание:", "");
          
            var addFilmsForm = document.createElement("form");
            addFilmsForm.method = "post";
            addFilmsForm.action = "add_film.php";

            var nameInput = document.createElement("input");
            nameInput.type = "text";
            nameInput.name = "new_name";
            nameInput.value = name;

            var dateInput = document.createElement("input");
            dateInput.type = "text";
            dateInput.name = "new_date";
            dateInput.value = date;

            var aboutInput = document.createElement("input");
            aboutInput.type = "text";
            aboutInput.name = "new_about";
            aboutInput.value = about;

            var addButton = document.createElement("button");
            addButton.type = "submit";
            addButton.textContent = "Add Films";

            addFilmsForm.appendChild(nameInput);
            addFilmsForm.appendChild(dateInput);
            addFilmsForm.appendChild(aboutInput);
            addFilmsForm.appendChild(addButton);

            document.body.appendChild(addFilmsForm);
            addFilmsForm.submit();
            
        }
    </script>
     </div>

 </div>
<!-- </body>
</html> -->
<div class="s">
<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: user_list.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql_role = "SELECT role FROM user WHERE id=$user_id";
$result_role = $conn->query($sql_role);

if ($result_role->num_rows > 0) {
    $user_role = $result_role->fetch_assoc()['role'];

    if ($user_role === 'admin') {
     
        echo '<a href="users.php">Users</a> <br><br>';
        echo '<a href="films.php">Films</a>';
        }

    
    $sql = "SELECT * FROM user WHERE id=$user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo "<h2> </h2>";
    } else {
        echo "Нет пользователя";
    }
} else {
    echo "Не удалось определить роль пользователя";
}


$conn->close();

?></div></body>
</html>