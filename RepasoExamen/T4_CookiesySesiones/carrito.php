
<?php

session_start();
require_once("catalogo.php");

$carro = $_SESSION["carrito"] ?? [];

$quitar = $_GET["quitar"] ?? null;
$vaciar = $_GET["vaciar"] ?? null;
$finalizar = $_GET["finalizar"] ?? null;

if ($quitar !== null) {

    if (
        ctype_digit($quitar) &&
        (string)(int)$quitar === $quitar &&
        array_key_exists((int)$quitar, $catalogo)
    ) {

        $id = (int)$quitar;
        $posicion = array_search($id, $carro, true);

        if ($posicion !== false) {
            unset($carro[$posicion]);
            $_SESSION["carrito"] = array_values($carro);
        }
    }

    header("Location: carrito.php");
    exit;
}

if ($vaciar === "1") {
    unset($_SESSION["carrito"]);

    header("Location: carrito.php");
    exit;
}

$cantTotal = count($carro);
$total = 0;

foreach ($carro as $id) {
    if (isset($catalogo[$id])) {
        $total += $catalogo[$id]["precio"];
    }
}

if ($finalizar === "1") {

    if (empty($carro)) {
        header("Location: carrito.php");
        exit;
    }

    header("Location: finalizar.php?total=" . $total . "&cantidad=" . $cantTotal);
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
</head>

<body>

    <?php if (!empty($carro)): ?>

        <table border="1">

            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Quitar</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($catalogo as $id => $producto): ?>

                    <?php
                    $cant = count(array_keys($carro, $id, true));
                    ?>

                    <?php if ($cant > 0): ?>

                        <tr>
                            <td><?= htmlspecialchars($producto["nombre"]) ?></td>
                            <td><?= $producto["precio"] ?> €</td>
                            <td><?= $cant ?></td>
                            <td><?= $producto["precio"] * $cant ?> €</td>
                            <td>
                                <a href="carrito.php?quitar=<?= $id ?>">
                                    Quitar uno
                                </a>
                            </td>
                        </tr>

                    <?php endif; ?>

                <?php endforeach; ?>

            </tbody>

        </table>

        <p>Total: <?= $total ?> €</p>

        <a href="carrito.php?vaciar=1">Vaciar carrito</a>

        <a href="carrito.php?finalizar=1">Finalizar compra</a>

        <a href="tienda.php">Seguir comprando</a>

    <?php else: ?>

        <h2>El carrito está vacío</h2>

        <a href="tienda.php">Seguir comprando</a>

    <?php endif; ?>

</body>
</html>
