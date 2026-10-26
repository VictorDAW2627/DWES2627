<?php

$error = "";

if ((isset($_REQUEST["usuario"]) and !empty($_REQUEST["usuario"])) and (isset($_REQUEST["contraseña"]) and !empty($_REQUEST["contraseña"]))) {
    if (file_exists("usuarios.txt")) {
        $usuarios = file("usuarios.txt");
        for ($i = 0; $i < count($usuarios); $i++) {
            $linea = explode(":", $usuarios[$i]);
            if (trim($linea[0]) == $_REQUEST["usuario"] and trim($linea[1]) == $_REQUEST["contraseña"]) {
                session_start();
                $_SESSION["loginusu"] = $_REQUEST["usuario"];
                header("location: index.php");
            }
        }
        $error = "<p style='color: red'>El usuario o contraseña no son validos</p>";
    } else {
        $error = "<p style='color: yellow'>El archivo de usuarios no existe</p>";
    }
} else {
    $error = "<p style='color: yellow'>Alguno de los campos esta vacio</p>";
}

?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <title>Inicio de sesion</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> method="post">
        <input type="text" name="usuario" id="usuario" placeholder="Usuario">
        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
        <?php echo $error?>
        <input type="submit" name="enviar" id="enviar">
    </form>

</body>

</html>