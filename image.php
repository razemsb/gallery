<?php
require_once('db.php');
require_once('log.php');
session_start();
$user_login = $_SESSION['user_login'];
$is_admin = $_SESSION['is_admin'];

if (isset($_GET['id'])) {
    $imageID = (int)$_GET['id'];

    $result = $conn->query("SELECT ID, Filetitle, Filename, upload_user, upload_date, likes FROM image WHERE ID = $imageID");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ID = htmlspecialchars($row['ID']);
        $filename = htmlspecialchars($row['Filetitle']);
        $upload_user = htmlspecialchars($row['upload_user']);
        $upload_path = htmlspecialchars($row['Filename']);
        $likes = (int)$row['likes'];
    } else {
        header('Location: index.php');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like'])) {
    $conn->query("UPDATE image SET likes = likes + 1 WHERE ID = $imageID");
    header("Location: image.php?id=$imageID");
    exit();
}
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filetitle'])) {
    $newname = $_POST['filetitle'];
    writeToLog($newname . "название");
    $conn->query("UPDATE Filetitle = $newname FROM image WHERE ID = $imageID");
    header("Location: image.php?id=$imageID");
    exit();
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/image.css">
    <title>Картинка <?= $filename ?></title>
</head>
<body>
<header>
<nav>
<ul class="list">
<li><a href="index.php">На главную</a></li>
<?php if ($is_admin): ?>
<li><a href="admin.php">Админ</a></li><br>
<?php endif; ?>
<li><a onclick="openModal2()">Загрузить файл</a></li>
<div class="right">
<li><a href="account.php">Ваш аккаунт: <?= htmlspecialchars($user_login) ?></a></li>
</div>
</ul>
</nav>
</header>

<div class="image-container">
    <div class="info-section">
    <img src="<?= $upload_path ?>" alt="<?= $filename ?>" class="image">
    <div class="buttons">
        <form method="post" style="display: inline;">
            <button type="submit" name="like" class="like-button">❤️ Лайк</button>
        </form>
        <a href="<?= $upload_path ?>" download="<?= $filename ?>" class="download-button">⬇️ Скачать</a>
        <?php if ($is_admin): ?>
<form action="delete_img.php" method="post">
<input type="hidden" name="id" value="<?= htmlspecialchars($ID) ?>">
<button type="submit" class="delete_button">Удалить</button><br>
</form>
<?php
 endif; ?>
    </div>
        <?php if ($upload_user == $user_login): ?>
        <form method="post">
        <input type="text" name="filetitle" value="<?= $filename ?>">
        <input type="submit" value="Сохранить">
        </form>
        <?php else: ?>
        <h2 class="filename"><?= $filename ?></h2>
        <?php endif; ?>
        <p class="likes-count">❤️ <?= $likes ?></p>
    </div>
</div>
    </div>
</div>

</body>
</html>
