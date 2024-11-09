<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $query = "DELETE FROM image WHERE ID='$id'";


    if (mysqli_query($conn, $query)) {
        header('Location: admin.php'); 
        exit();
    } else {
        echo "Error deleting img: " . mysqli_error($conn);
    }
}
?>
