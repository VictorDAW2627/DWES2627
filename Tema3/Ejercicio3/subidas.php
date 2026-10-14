<?php
$imagenes="";
$album = scandir(__DIR__ . "/imagenes");
for ($i=0; $i < count($album); $i++) { 
    if (!str_starts_with($album[$i],".")) {
        $imagenes .= "<img src='imagenes/".$album[$i]."' class='img-thumbnail' alt='imagen".$i."'>";
    }
}

?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <title>Album</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php echo $imagenes ?>
</body>


</html>