<?php
session_start();
$name = $_SESSION['user_login'];
require_once('log.php');
$user = "root";
$password = "root";
$host = "localhost";
$db = "files";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Ошибка соединения: ".$conn->connect_error);
    $message = "Ошибка подключения к бд";
    writeToLog("Ошибка подключения к бд", $name);
}else {

}
?>