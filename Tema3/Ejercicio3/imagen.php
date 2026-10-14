<?php
$imagen = "";
if (isset($_GET["imagen"])) {
    $path = basename($_GET["imagen"]);
    if (is_file(__DIR__."/imagenes/".$path)) {
        $imagen = "<img src='" . "imagenes/" . htmlspecialchars($path) . "' class ='rounded float-start' alt='Imagen subida'>
                   <div class='rounded float-end'>".
                        "<div class = ''form-text>Ruta del archivo: ".__DIR__."/imagenes/".$path."</div>".
                        "<div class = ''form-text>Nombre del archivo: ".$path."</div>".
                        "<div class = ''form-text>Ancho: ".getimagesize(__DIR__."/imagenes/".$path)[0]."px</div>".
                        "<div class = ''form-text>Altura: ".getimagesize(__DIR__."/imagenes/".$path)[1]."px</div>"
                   ."</div>";
    } else {
        $imagen = "<div class='form-text' style='color: red'>El archivo no existe en el servidor</div>";
    }
    
} else {
    $imagen = "<div class='form-text' style='color: red'>No se ha recibido el archivo</div>";
}
header("Refresh:5; url=formulario.php")
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <title>Imagen</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="display: flex; justify-content: space-around;">
    <?php echo $imagen; ?>
</body>

</html>