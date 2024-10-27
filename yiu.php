<?php
include_once('db.php');
$message = ""; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
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
<script>
        const message = document.getElementById('uploadMessage');
        if (message.innerHTML) {
            message.style.display = 'block';
            setTimeout(() => {
                message.classList.add('fade-out');
                setTimeout(() => {
                    message.style.display = 'none';
                }, 1000); // время анимации изчезновения
            }, 3000);  // время существования message
        }
    </script>
<script>
    document.getElementById('switchToLogin').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('form2').classList.add('hidden');
        document.getElementById('form1').classList.remove('hidden');
    });

    document.getElementById('switchToRegister').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('form2').classList.remove('hidden');
        document.getElementById('form1').classList.add('hidden');
    });
</script>
</body>
</html>