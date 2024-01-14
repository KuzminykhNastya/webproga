<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['user_id'])) {
    $userToDelete = $_POST['user_id'];

    $sql = "DELETE FROM user WHERE id = $userToDelete";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Ошибка удаления пользователя: " . $conn->error;
    }
} else {
    echo "Ошибка";
}

$conn->close();
?>
