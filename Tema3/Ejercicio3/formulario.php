<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <title>Formulario</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <form action=<?php echo htmlspecialchars($_SERVER["PHPSELF"]); ?> method="post" enctype="multipart/form-data">
        <div class="input-group">
            <input type="file" class="form-control" id="imagen" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="imagen">
            <button class="btn btn-outline-secondary" type="submit" id="imagen">Subir</button>
        </div>
    </form>
</body>

</html>

<?php

$imagen = $_REQUEST["imagen"];

?>