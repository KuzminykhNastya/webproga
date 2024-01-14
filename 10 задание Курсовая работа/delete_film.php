
<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['films_id'])) {
    $filmsToDelete = $_POST['films_id'];

    $sql = "DELETE FROM films WHERE id = $filmsToDelete";

    if ($conn->query($sql) === TRUE) {
        header("Location: films.php");
        exit();
    } else {
        echo "Ошибка удаления фильма: " . $conn->error;
    }
} else {
    echo "Ошибка";
}

$conn->close();
?>
