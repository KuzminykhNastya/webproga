<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mysite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка соединения: " . $conn->connect_error);
}
?>
