
<?php
// Проверка авторизации пользователя
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: dashboard.php'); // Перенаправление на страницу авторизации, если пользователь не авторизован
  exit();
}

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mysite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Обработка формы изменения данных
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $newUsername = $_POST['newUsername'];
  $newPassword = $_POST['newPassword'];

  // Защита от SQL-инъекций
  $newPassword = password_hash(mysqli_real_escape_string($conn, $newPassword), PASSWORD_DEFAULT);

  // Обновление данных в базе данных
  $sql = "UPDATE user SET username='$newUsername', password='$newPassword' WHERE id=" . $_SESSION['user_id'];
  if ($conn->query($sql) === TRUE) {
    echo "Данные успешно обновлены";
  } else {
    echo "Ошибка при обновлении данных: " . $conn->error;
  }
}

$conn->close();
?>
