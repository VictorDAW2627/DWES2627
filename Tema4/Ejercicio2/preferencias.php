<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <title>Formulario</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <form action="guarda_prefs.php" method="post">
        <div class="form-field">
            <label for="nombre" class="form-label">Introduzca su nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" style="width: 25%;">
        </div><br>

        <div class="form-field">
            <label for="color" class="form-label">Introduzca su color favorito:</label>
            <input type="color" name="color" id="color" class="form-control form-control-color" >
        </div><br>

        <button type="submit" class="btn-solid theme-primary">Guardar</button>

    </form>
</body>

</html>