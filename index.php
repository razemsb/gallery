<?php
session_start();
require_once('db.php');
$user_login = $_SESSION['user_login'];
if($_SESSION['user_login']) {

$message = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES["filename"])) {
    if ($_FILES["filename"]["error"] == UPLOAD_ERR_OK) {
        $name = basename($_FILES["filename"]["name"]);
        $uploadDir = "files/";
        $uploadFile = $uploadDir . $name;
        $filesize = $_FILES["filename"]["size"];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/svg+xml'];

        if (!in_array($_FILES["filename"]["type"], $allowedTypes)) {
            $message = "Загружать можно только изображения (jpeg, png, svg).";
        } elseif ($filesize > 10485760) {
            $message = "Файл слишком большой. Максимальный размер - 10MB.";
        } elseif (file_exists($uploadFile)) {
            $message = "Файл уже существует.";
        } else {
            $uploadTime = date('Y-m-d H:i:s');
            if (move_uploaded_file($_FILES["filename"]["tmp_name"], $uploadFile)) {
                $message = "Файл загружен: $name";
                $sql = "INSERT INTO files (Filename, upload_date, filesize, upload_user) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $name, $uploadTime, $filesize, $user_login);

                if ($stmt->execute()) {
                    $message .= "<br>Информация о файле успешно сохранена в базе данных.";
                } else {
                    $message .= "<br>Ошибка при сохранении информации о файле в базе данных: " . $stmt->error;
                }

                $stmt->close();
            } else {
                $message = "Ошибка при загрузке файла.";
            }
        }
    }
}

$sql = "SELECT Filename, upload_date, upload_user FROM files";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Файл-загрузчик</title>
</head>
<body>
<header>
<nav>
<ul class="list">
<li><a href="session_destroy.php">Выйти из аккаунта</a></li>
<div class="right">
<li><a href="account.php">Ваш аккаунт: <?echo $user_login;?></a></li>
</div>
</ul>
</nav>
</header>
<div class="gallery">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="image-block">
            <img src="files/<?php echo $row['Filename']; ?>" 
                 alt="<?php echo $row['Filename']; ?>" 
                 class="image" 
                 onclick="openModal('<?php echo $row['Filename']; ?>', '<?php echo $row['upload_user']; ?>', '<?php echo $row['upload_date']; ?>')">
                 <div class="file-name"><?php echo $row['Filename']; ?></div>
            <a class="users">Файл загружен: <?php echo $row['upload_user']; ?></a>
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
        </div>
    </div>
</div>
    <div class="upload-container">
        <form method="post" enctype="multipart/form-data">
            <h2>Загрузить файл</h2>
            <input type="file" name="filename" size="10" required/><br><br>
            <input type="submit" value="Загрузить">
        </form>
    </div>
    <div class="message" id="uploadMessage"><?php echo $message; ?></div>

<script src="script/scripts.js"></script>
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
<script src="script/reg.js"></script>';
}
?>