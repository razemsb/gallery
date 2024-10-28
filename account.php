<?php
session_start();
$user_login = $_SESSION['user_login'];
require_once('db.php');

$message = "";

if (isset($_GET['delete']) && isset($_GET['file'])) {
    $fileToDelete = $_GET['file'];
    $filePath = "files/" . $fileToDelete;

    if (file_exists($filePath)) {
        if (unlink($filePath)) {

            $sql = "DELETE FROM files WHERE Filename = ? AND upload_user = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $fileToDelete, $user_login);

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

$sql = "SELECT Filename, upload_date, upload_user, upload_path FROM files WHERE upload_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_login);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/account.css">
    <title>Аккаунт <?php echo $user_login; ?></title>
</head>
<body>
<header>
    <nav>
        <ul class="list">
            <li><a href="index.php">Назад</a></li>
        </ul>
    </nav>
</header>

<?php if ($message): ?>
    <div class="message"><?php echo $message; ?></div>
<?php endif; ?>

<div class="gallery">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="image-block">
            <img src="<?php echo htmlspecialchars($row['upload_path']); ?>" 
                 alt="<?php echo htmlspecialchars($row['Filename']); ?>" 
                 class="image" 
                 onclick="openModal('<?php echo htmlspecialchars($row['Filename']); ?>', '<?php echo htmlspecialchars($row['upload_user']); ?>', '<?php echo htmlspecialchars($row['upload_date']); ?>', '<?php echo htmlspecialchars($row['upload_path']); ?>')">
            <div class="file-name"><?php echo htmlspecialchars($row['Filename']); ?></div>
            <a class="users">Файл загружен: <?php echo htmlspecialchars($row['upload_user']); ?></a>
        </div>
    <?php } ?>
</div>
<div id="myModal" class="modal">
    <span class="modal-close" onclick="closeModal()">&times;</span>
    <div class="modal-content-wrapper">
        <img class="modal-content" id="modalImg">
        <div class="modal-text-content">
            <div class="modal-caption" id="modalCaption"></div>
            <div class="modal-text">Загрузил: <span id="modalUser"></span></div>
            <div class="modal-text">Дата загрузки: <span id="modalDate"></span></div>
            <button id="downloadBtn" class="download-button" style="margin-top: 10px;" onclick="downloadImage()">Скачать</button>
        </div>
    </div>
</div>

<div class="account-info">
</div>
<script src="script/scripts.js"></script>
<script src="script/upload.js"></script>
<script src="script/download.js"></script>
</body>
</html>
