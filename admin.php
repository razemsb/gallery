<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: index.php');
    exit();
}

$users = [];

$query = "SELECT ID, Login, Email, is_admin FROM users";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

$query = "SELECT ID, Filetitle, Filename, upload_user FROM image";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $image[] = $row;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка - Управление сайтом</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<header>
    <h1>Админка</h1>
    <nav>
        <button class="nav-button" onclick="window.location.href='index.php';">Главная</button>
        <button class="nav-button" onclick="showSection('manage-users')">Управление пользователями</button>
        <button class="nav-button" onclick="showSection('manage-img')">Управление картинками</button>
    </nav>
</header>

<div id="manage-users" class="section">
    <h2>Управление пользователями</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Логин</th>
                <th>Email</th>
                <th>Админ</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['ID']) ?></td>
                    <td><?= htmlspecialchars($user['Login']) ?></td>
                    <td><?= htmlspecialchars($user['Email']) ?></td>
                    <td><?= $user['is_admin'] ? 'Да' : 'Нет' ?></td>
                    <td>
                        <form action="delete_user.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($user['ID']) ?>">
                            <button type="submit" class="delete">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div id="manage-img" class="section">
    <h2>Управление картинками</h2>
    <table>
        <thead>
            <tr>
                <th>Img</th>
                <th>ID</th>
                <th>Название</th>
                <th>Загрузил</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($image as $img): ?>
                <tr>
                    <td><img src="<?= htmlspecialchars($img['Filename']) ?>" style="width: 200px; height: 2=50px;"></td>
                    <td><?= htmlspecialchars($img['ID']) ?></td>
                    <td><?= htmlspecialchars($img['Filetitle']) ?></td>
                    <td><?= htmlspecialchars($img['upload_user']) ?></td>
                    <td>
                        <form action="delete_img.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($img['ID']) ?>">
                            <button type="submit" class="delete">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="script.js"></script>
</body>
</html>
