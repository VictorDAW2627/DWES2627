<?php
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["imagen"])) {
        if (UPLOAD_ERR_OK == $_FILES["imagen"]["error"]) {
            $path = $_FILES["imagen"]["tmp_name"];
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($path);

            if (str_starts_with($mime, "image/")) {
                $nombre = uniqid();
                $extension = explode("/", $mime);
                $archivo = $nombre . "." . $extension[1];
                $destino = "/opt/lampp/htdocs/DWES/Tema3/Ejercicio3/imagenes/" . $archivo;

                if (move_uploaded_file($path, $destino)) {
                    header("location: imagen.php?imagen=" . urlencode($archivo));
                    exit;
                } else {
                    $mensaje = "<div class='form-text' style='color: red'>El archivo no se ha podido subir al servidor</div>";
                }
            } else {
                $mensaje = "<div class='form-text' style='color: red'>El archivo no es una imagen</div>";
            }
        } else {
            $mensaje = "<div class='form-text' style='color: red'>Ha habido un error al subir el archivo</div>";
        }

    } else {
        $mensaje = "<div class='form-text' style='color: red'>Ha habido un error al mandar el archivo</div>";
    }

}

?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <title>Formulario</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <input type="file" class="form-control" id="imagen" aria-describedby="inputGroupFileAddon04"
                aria-label="Upload" name="imagen">
            <button class="btn btn-outline-secondary" type="submit" id="subir">Subir</button>
            <a href="subidas.php" class="btn btn-info">Album de imagenes</a>
        </div>
    </form>
    <?php
    echo $mensaje;
    ?>
</body>

</html>