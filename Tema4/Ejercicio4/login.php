<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <title>DWES</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <h1>Calificación Alumnos</h1>

    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> method="post">
        <input type="text" name="usuario" id="usuario" placeholder="Usuario">
        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
    </form>

    <h1>Lista de alumnos</h1>

    <?php echo $tabla ?>

    <br><a href="borrar.php">Borrar notas...</a>

</body>

</html>