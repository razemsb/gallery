<?php
session_start();
$user_login = $_SESSION['user_login'];
require_once('db.php');

if (isset($_GET['delete']) && isset($_GET['file'])) {
    $fileToDelete = $_GET['file'];
    $filePath = "files/" . $fileToDelete;

    if (file_exists($filePath)) {
        if (unlink($filePath)) {

            $sql = "DELETE FROM files WHERE Filename = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $fileToDelete);

            if ($stmt->execute()) {
                $message = "Файл '$fileToDelete' успешно удален.";
            } else {
                $message = "Ошибка при удалении файла из базы данных: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $message = "Не удалось удалить файл с сервера.";
        }
    } else {
        $message = "Файл не найден.";
    }
}

$sql = "SELECT Filename, upload_date, upload_user FROM files WHERE upload_user = '$user_login'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Аккаунт <? echo $user_login; ?></title>
</head>
<body>
<header>
<nav>
<ul class="list">
<li><a href="index.php">Назад</a></li>
</ul>
</nav>
</header>
<div class="gallery">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="image-block">
                <img src="files/<?php echo $row['Filename']; ?>" alt="<?php echo $row['Filename']; ?>">
                <a href="?delete=true&file=<?php echo $row['Filename']; ?>" class="a">Удалить</a>
                <a class="users">Файл загружен: <?php echo $row['upload_user']; ?></a>
            </div>
        <?php } ?>
    </div>
</body>
</html>