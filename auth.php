<?php
session_start();
require_once('db.php');
$_SESSION['user_login'] = $name;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT Password, is_admin FROM users WHERE Login = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->bind_result($Password, $is_admin);
    $stmt->fetch();
    $stmt->close();

    if ($pass === $Password) {
        echo "<script>alert('Успешная авторизация'); window.location.href = 'index.php';</script>";
        $_SESSION['user_login'] = $name;
        $_SESSION['is_admin'] = $is_admin;
    } else {
        echo "<script>alert('Неверный логин или пароль'); window.location.href = 'index.php';</script>";
    }

    $conn->close();
}
?>