<?php

session_start();
require_once("catalogo.php");

$anadir = $_GET["anadir"] ?? null;
$olvidar = $_GET["olvidar"] ?? null;

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}

$ultimos = [];

if (isset($_COOKIE["ultimos"])) {
    $datos = explode(",", $_COOKIE["ultimos"]);

    foreach ($datos as $id) {
        if (
            ctype_digit($id) &&
            (string) (int) $id === $id &&
            array_key_exists((int) $id, $catalogo)
        ) {
            if (!in_array((int) $id, $ultimos, true)) {
                $ultimos[] = (int) $id;
            }
        }
    }
}

if ($olvidar == "1") {
    setcookie("ultimos", "", time() - 3600);
    header("Location: tienda.php");
    exit;
}

if ($anadir !== null) {

    if (
        ctype_digit($anadir) &&
        (string) (int) $anadir === $anadir &&
        array_key_exists((int) $anadir, $catalogo)
    ) {

        $id = (int) $anadir;

        $_SESSION["carrito"][] = $id;

        $ultimos = array_diff($ultimos, [$id]);

        array_unshift($ultimos, $id);

        $ultimos = array_slice($ultimos, 0, 3);

        setcookie("ultimos", implode(",", $ultimos), time() + 604800);
    }

    header("Location: tienda.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
</head>

<body>

    <p>
        Unidades en el carrito:
        <?= count($_SESSION["carrito"]) ?>
        <a href="carrito.php">Ver carrito</a>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Añadir</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($catalogo as $id => $producto): ?>

                <tr>
                    <td><?= htmlspecialchars($producto["nombre"]) ?></td>
                    <td><?= $producto["precio"] ?> €</td>
                    <td>
                        <a href="tienda.php?anadir=<?= $id ?>">
                            Añadir
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

    <?php if (!empty($ultimos)): ?>

        <p>
            Añadidos recientemente:

            <?php
            $nombres = [];

            foreach ($ultimos as $id) {
                $nombres[] = $catalogo[$id]["nombre"];
            }

            echo implode(", ", $nombres);
            ?>

            <a href="tienda.php?olvidar=1">Olvidar</a>
        </p>

    <?php endif; ?>

</body>

</html>