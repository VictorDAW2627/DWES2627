<!DOCTYPE html>
<html lang = "es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="compruebaLogin.php" method="post" style="display: flex; flex-direction: column;">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario" style="width: 150px;">

        <label for="contraseña">Contraseña</label>
        <input type="password" id="contraseña" name="contraseña" style="width: 150px;"> <br>

        <input type="submit" style="width: 50px;">
    </form>
</body>
</html>