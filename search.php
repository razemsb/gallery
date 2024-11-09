<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db.php');
session_start();
$user_login = $_SESSION['user_login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search.css">
    <title>Поиск</title>
</head>
<body>
<header>
<nav>
<ul class="list">
<li><a href="index.php">Главная</a></li>
<div class="right">
<li><a href="account.php">Ваш аккаунт: <?echo $user_login;?></a></li>
</div>
</ul>
</nav>
</header>
<div class="user-list">
    <h2>Список пользователей</h2>
    <?php

    $query = "SELECT id, Login FROM users";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $userId = $row['id'];
                $username = htmlspecialchars($row['Login']);
                
                echo "<div class='user-item'>";
                echo "<a href='profile.php?id={$userId}'>{$username}</a>";
                echo "</div>";
            }
        } else {
            echo "<p>Пользователи не найдены.</p>";
        }
    } else {
        echo "<p>Ошибка при выполнении запроса: " . mysqli_error($conn) . "</p>";
    }
    mysqli_close($conn);
    ?>
</div>

</body>
</html>
