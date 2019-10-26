<!DOCTYPE html>
<html lang="ru">
    <head>
    <title>GitRu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/styleRegisration.css">
    <script type="text/javascript" src="scripts/config.js"></script>
    <script type="text/javascript" src="scripts/jQuery.js"></script>
    <script type="text/javascript" src="scripts/script.js"></script>
    </head>
    <body>
    <?php include_once "includes/header.html"; ?>
    <div class="content">
        <h1 align="center">Регистрация</h1>
        <div class="registrationForm">
            <input type="text" placeholder="Имя" id="name">
            <input type="text" placeholder="Фамилия" id="surname">
            <input type="email" placeholder="Почта" id="e_mail">
            <input type="password" placeholder="Пароль" id="password_1" value="111111">
            <input type="password" placeholder="Повторите пароль" id="password_2" value="111111">
            <div class="errorsOutput"></div>
            <div class="submitButton" onclick="registration()">
                <h2 align="center">Зарегистрироваться</h2>
            </div>
        </div>
    </div>
    <?php include_once "includes/footer.html"; ?>
    </body>
</html>