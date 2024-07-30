<!DOCTYPE HTML>
<html>
    <head>
    </head>
    <body>
        <form method="POST" action="auth/reg.php">
            имя юзера: <input name="user"><br>
            пароль: <input name="password"><br>
            <input type="submit" value="Регистрация">
        </form>
        <hr>
        <form method="POST" action="auth/login.php">
            имя юзера: <input name="user"><br>
            пароль: <input name="password"><br>
            <input type="submit" value="Логин">
        </form>
        <hr>
        <a href="posts.php">Посты</a>
    </body>
</html>