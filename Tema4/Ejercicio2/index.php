<?php
$mensaje = "";

if (isset($_COOKIE["nombreusu"]) and isset($_COOKIE["colorusu"])) {
    $mensaje = "<body style='background-color: " . $_COOKIE["colorusu"] . "'>
                    <h1>Bienvenido, " . $_COOKIE["nombreusu"] . "<h1><br>
                    <a href='borrar_prefs.php'>Borre sus preferencias</a><br>";
} else {
    $mensaje = "<body><h1>Página de inicio<h1><br>";
}

?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <title>Index</title>
    <meta charset="UTF-8">
</head>
<?php echo $mensaje ?>
<a href="preferencias.php">Configure sus preferencias</a>

</body>

</html