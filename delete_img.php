<?php
session_start();
require_once('db.php');
require_once('log.php');
$user_login = $_SESSION['user_login'];

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $query = "DELETE FROM image WHERE ID='$id'";


    if (mysqli_query($conn, $query)) {
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
        writeToLog("удаление фото удачно", $user_login);
        exit();
    } else {
        echo "Error deleting img: " . mysqli_error($conn);
    }
}
?>
