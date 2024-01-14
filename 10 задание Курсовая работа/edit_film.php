<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['edit_fims_id'])) {
    $editFilmsId = $_POST['edit_films_id'];
    $newFilmsname = $_POST['new_name'];
    $newFilmsdate = $_POST['new_date'];
    $newFilmsabout = $_POST['new_about'];

    $sql = "UPDATE films SET name='$newFilmsname', date='$newDate', about='$newAbout'  WHERE id=$editFilmsId";

    if ($conn->query($sql) === TRUE) {
        header("Location: films.php");
        exit();
    } else {
        echo "Ошибка редактирования: " . $conn->error;
    }
}

$conn->close();
?>
