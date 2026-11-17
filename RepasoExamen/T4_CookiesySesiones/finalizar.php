
<?php

session_start();

$total = $_GET["total"] ?? 0;
$cantidad = $_GET["cantidad"] ?? 0;

foreach (array_keys($_SESSION) as $variable) {
    unset($_SESSION[$variable]);
}

session_destroy();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Compra exitosa</title>
</head>

<body>

    <h1>Compra realizada</h1>

    <h2>
        Has comprado <?= (int)$cantidad ?> unidades
        por <?= (int)$total ?> €
    </h2>

    <a href="tienda.php">Volver a la tienda</a>

</body>
</html>
