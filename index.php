<?php
session_start();
require_once('db.php');

$user_login = $_SESSION['user_login'];
$is_admin = $_SESSION['is_admin'];

if ($_SESSION['user_login']) {
    $message = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES["filename"])) {
        if ($_FILES["filename"]["error"] == UPLOAD_ERR_OK) {
            $fileTitle = $_POST['file_title'];
            $uploadDir = "files/";
            $fileExtension = pathinfo($_FILES["filename"]["name"], PATHINFO_EXTENSION);
            $newFilename = round(microtime(true)) . '_' . rand(1000, 9999) . '.' . $fileExtension;
            $uploadFile = $uploadDir . $newFilename;
            $filesize = $_FILES["filename"]["size"];
            $allowedTypes = ['image/jpeg', 'image/png', 'image/svg+xml', 'image/gif'];
            $likes = 0;

            if (!in_array($_FILES["filename"]["type"], $allowedTypes)) {
                $message = "Загружать можно только изображения (jpeg, png, svg).";
            } elseif ($filesize > 10485760) {
                $message = "Файл слишком большой. Максимальный размер - 10MB.";
            } elseif (file_exists($uploadFile)) {
                $message = "Файл уже существует.";
            } else {
                $uploadTime = date('Y-m-d H:i:s');
                
                if (move_uploaded_file($_FILES["filename"]["tmp_name"], $uploadFile)) {
                    $message = "Файл загружен: $newFilename";
                    
                    $sql = "INSERT INTO image (Filetitle, Filename, upload_user, upload_date, likes, size) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                
                    if ($stmt) {
                        $stmt->bind_param("ssssis", $fileTitle, $uploadFile, $user_login, $uploadTime, $likes, $filesize);
                
                        if ($stmt->execute()) {
                            $message .= "<br>Информация о файле успешно сохранена в базе данных.";
                            header('Location: index.php');
                            exit();
                        } else {
                            $message .= "<br>Ошибка при сохранении информации о файле в базе данных: " . $stmt->error;
                        }
                        
                        $stmt->close();
                    } else {
                        $message .= "<br>Ошибка при подготовке запроса: " . $conn->error;
                    }
                } else {
                    $message = "Ошибка при загрузке файла.";
                }
            }
        } else {
            $message = "Ошибка при загрузке файла. Код ошибки: " . $_FILES["filename"]["error"];
        }
    }

    $sql = "SELECT ID, Filetitle, Filename, upload_user, upload_date FROM image";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Файл-загрузчик</title>
</head>
<body>
<header>
<nav>
<ul class="list">
<li><a href="session_destroy.php">Выйти из аккаунта</a></li>
<?php if ($is_admin): ?>
<li><a href="admin.php">Админ</a></li><br>
<?php endif; ?>
<li><a onclick="openModal2()">Загрузить файл</a></li>
<div class="right">
<li><a href="account.php">Ваш аккаунт: <?php echo $user_login; ?></a></li>
</div>
</ul>
</nav>
</header>
<div class="gallery">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="image-block">
            <img src="<?php echo htmlspecialchars($row['Filename']); ?>" 
                 alt="<?php echo htmlspecialchars($row['Filetitle']); ?>" 
                 class="image" 
                 onclick="window.location.href='image.php?id=<?= $row['ID']; ?>';">
            <div class="file-name"><?php echo htmlspecialchars($row['Filetitle']); ?></div>
            <a class="users">Файл загружен: <?php echo htmlspecialchars($row['upload_user']); ?></a>
        </div>
        
    <?php } ?>
</div>
<div class="message" id="uploadMessage"><?php echo $message; ?></div>
<div id="myModal2" class="modal">
    <div class="upload-container">
    <form method="post" enctype="multipart/form-data">
        <h2>Загрузить файл</h2>
        <span class="modal-close" onclick="closeModal2()">&times;</span>
        <input type="file" name="filename" size="20" required onchange="showTitleField()" accept="image/png, image/gif, image/jpeg"/><br><br>
        
        <div id="titleField" style="display: none;">
            <input type="text" name="file_title" placeholder="Название файла" required><br><br>
        </div>
        
        <input type="submit" value="Загрузить">
    </form>
</div>
</div>

<script src="script/scripts.js"></script>
<script src="script/upload.js"></script>
<script src="script/download.js"></script>
</body>
</html>
<?php
} else {
    echo '
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Файл-загрузчик</title>
    </head>
    <div class="message" id="uploadMessage"><?php echo $message; ?></div>
    <div class="cont">
        <form id="form1" class="auth_form" action="auth.php" method="post">
            <strong>Авторизация</strong><br>
            <input type="text" name="name" placeholder="Ваш никнейм" required><br>
            <input type="password" name="pass" placeholder="Ваш Пароль" required><br>
            <p class="text">Нет аккаунта? <a href="#" id="switchToRegister">Регистрация</a></p><br>
            <input type="submit" value="Войти">
        </form>
    
        <form id="form2" class="auth_form hidden" action="register.php" method="post">
            <strong>Регистрация</strong><br>
            <input type="text" name="name" placeholder="Ваш никнейм" required><br>
            <input type="password" name="pass" placeholder="Ваш Пароль" required><br>
            <input type="password" name="repeatpass" placeholder="Повторите ваш Пароль" required><br>
            <input type="email" name="email" placeholder="Почта" required><br>
            <p class="text">Уже зарегистрированы? <a href="#" id="switchToLogin">Вход в аккаунт</a></p><br>
            <input type="submit" value="Зарегистрироваться">
        </form>
    </div>
<script src="script/reg.js"></script>';
}
?>