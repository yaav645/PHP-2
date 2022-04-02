<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
</head>
<body>
    Введите логин и пароль
    <form action="/auth/login" method="post" autocomplete="on">
        <input type="text" name="login" placeholder="admin" value="admin">
        <input type="password" name="pass" placeholder="123" value="123">
        Save? <input type="checkbox" name="save">
        <input type="submit" name="ok">
    </form>
    <br>
    <?php
    die();
?>

</body>
</html>