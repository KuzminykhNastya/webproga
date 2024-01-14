<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: user_list.html");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql_role = "SELECT role FROM user WHERE id=$user_id";
$result_role = $conn->query($sql_role);

if ($result_role->num_rows > 0) {
    $user_role = $result_role->fetch_assoc()['role'];

    if ($user_role === 'admin') {
        $sql_films = "SELECT id, name, date, about FROM films";
        $result_films = $conn->query($sql_films);

        if ($result_films->num_rows > 0) {
            echo "<div class='admin-panel'>";
            echo "<h3>Список фильмов:</h3>";
            echo "<ul>";
            while ($row = $result_films->fetch_assoc()) {
                echo "<li> " . $row['id'] . ",  " . $row['name'] . ",  " . $row['date'] . ",  " . $row['about'] . "   <br>
                      <button onclick='editFilms(" . $row['id'] . ")'>Редактировать</button>
                      <button onclick='confirmDelete(" . $row['id'] . ")'>Удалить</button></li>";
            }
            echo "</ul>";
            echo "<button onclick='showAddFilmsForm()'>Добавить фильм</button>";
            echo "</div>";
        } else {
            echo "Нет фильмов.";
        }
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
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Фильмы</title>
</head>
<body>
<body>

    <script>
        function editFilms(filmsId) {
            document.getElementById("edit_films_id").value = filmsId;
            document.getElementById("new_name").value = prompt("Введите новое название:", "");
            document.getElementById("new_date").value = prompt("Введите новую дату", "");
            document.getElementById("new_about").value = prompt("Введите новое описание:", "");
            document.forms[0].submit();
        }

        function confirmDelete(filmsId) {
            var confirmDelete = confirm("Удалить фильм?");
            if (confirmDelete) {
    
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
</body>
</html>
