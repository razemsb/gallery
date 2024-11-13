<?php
require_once('log.php');
session_start();

if (isset($_SESSION['user_login'])) {
    unset($_SESSION['user_login']);
    
    session_unset();
    session_destroy();
    writeToLog("Выход с аккаунта", $user_login);
    echo "<script>alert('Вы вышли из аккаунта.')</script>";
    header("Location: index.php");
    exit();
} else {
    echo "<script>alert('Вы не вошли в аккаунт.')</script>";
    header("Location: index.php");
}
?>
