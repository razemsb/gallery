<?php
$user = "root";
$password = "root";
$host = "localhost";
$db = "FILES";

// Создание соединения
$conn = new mysqli($host, $user, $password, $db);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка соединения: ".$conn->connect_error);
}
?>