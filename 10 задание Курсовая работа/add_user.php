<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['username']) && isset($_POST['new_password'])) {
    $newUsername = $_POST['username'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, password) VALUES ('$newUsername', '$newPassword')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Не удалось добавить нового пользователя: " . $conn->error;
    }
} else {
    echo "Ошибка";
}

$conn->close();
?>
