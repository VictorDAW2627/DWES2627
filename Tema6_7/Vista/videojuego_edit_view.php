<!-- videojuego_view.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Videojuego</title>
    <link rel="stylesheet" href="Vista/style.css">
</head>

<body>
    <h1>Gestión de Videojuegos</h1>
    <!-- Si el controlador nos envía un mensaje, lo mostramos -->
    <?php if (!empty($mensaje)): ?>
        <div class="alerta"><?php echo htmlspecialchars($mensaje); ?></div>
    <?php endif; ?>
    <!-- Formulario para añadir nuevos registros -->
    <div class="formulario">
        <h3>Editar Videojuego</h3>
        <form action="index.php" method="POST">
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="campo">
                <label for="genero">Género:</label>
                <input type="text" id="genero" name="genero" required>
            </div>
            <div class="campo">
                <label for="precio">Precio (€):</label>
                <input type="number" id="precio" name="precio" step="0.01" required>
            </div>
            <button type="submit">Guardar cambios</button>
        </form>
    </div>
    <!-- Tabla que lista los videojuegos que nos mandó el controlador -->
    <h2>Listado Actual</h2>
    <?php if (!empty($videojuegos)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>Precio</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($videojuegos as $juego): ?>
                    <?php if ($id=$juego['id']): ?>
                    <tr>
                        <td>
                            <?php echo htmlspecialchars($juego['id'] ?? ''); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($juego['titulo']);?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($juego['genero']);?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($juego['precio']);?> €
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay videojuegos registrados en el sistema.</p>
    <?php endif; ?>
</body>

</html>