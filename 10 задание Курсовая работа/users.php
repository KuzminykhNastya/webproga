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
        $sql_users = "SELECT id, username FROM user";
        $result_users = $conn->query($sql_users);

        if ($result_users->num_rows > 0) {
            echo "<div class='admin-panel'>";
            echo "<h3>Список пользователей:</h3>";
            echo "<ul>";
            while ($row = $result_users->fetch_assoc()) {
                echo "<li> " . $row['id'] . ",  " . $row['username'] . " 
                      <button onclick='editUser(" . $row['id'] . ")'>Редактировать</button>
                      <button onclick='confirmDelete(" . $row['id'] . ")'>Удалить</button></li>";
            }
            echo "</ul>";
            echo "<button onclick='showAddUserForm()'>Добавить пользователя</button>";
            echo "</div>";
        } else {
            echo "Нет зарегистрированных пользователей.";
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
    <title>Пользователи</title>
</head>
<body>


    <script>
        function editUser(userId) {
            document.getElementById("edit_user_id").value = userId;
            document.getElementById("new_username").value = prompt("Введите новый логин:", "");
            document.getElementById("new_password").value = prompt("Введите новый пароль:", "");

            document.forms[0].submit();
        }

        function confirmDelete(userId) {
            var confirmDelete = confirm("Удалить пользователя?");
            if (confirmDelete) {
    
                var deleteForm = document.createElement("form");
                deleteForm.method = "post";
                deleteForm.action = "delete_user.php";

                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "user_id";
                input.value = userId;

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
    </script>
</body>
</html>
