<?php
session_start();
require_once('db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $repeatpass = $_POST['repeatpass'];
    $email = $_POST['email'];

    if ($pass !== $repeatpass) {
        echo "<script>alert('Пароли не совпадают'); window.location.href = 'index.php';</script>";
        exit();
    }

    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE Login = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "<script>alert('Этот логин уже занят. Пожалуйста, выберите другой.'); window.location.href = 'index.php';</script>";
        exit();
    }
    $is_admin = "0";
    $stmt = $conn->prepare("INSERT INTO users (Login, Password, Email, is_admin) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $name, $pass, $email, $is_admin);

    if ($stmt->execute()) {
        echo "<script>alert('Успешная регистрация'); window.location.href = 'index.php';</script>";
        $_SESSION['user_login'] = $name;
    } else {
        echo "<script>alert('Ошибка при регистрации: " . $conn->errno . "'); window.location.href = 'index.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
