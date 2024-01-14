<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['new_name']) && isset($_POST['new_date']) && isset($_POST['new_about'])) {
    $name = $_POST['new_name'];
    $date = $_POST['new_date'];
    $about = $_POST['new_about'];

    $sql = "INSERT INTO films (name, date, about) VALUES ('$name', '$date', '$about')";

    if ($conn->query($sql) === TRUE) {
        header("Location: films.php");
        exit();
    } else {
        echo "Не удалось добавить новый фильм: " . $conn->error;
    }
} else {
    echo "Ошибка";
}

$conn->close();
?>
