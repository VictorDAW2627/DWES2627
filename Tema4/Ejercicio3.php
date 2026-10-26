<?php



session_start();


if (isset($_REQUEST["nombre"]) and isset($_REQUEST["primEval"]) and isset($_REQUEST["seguEval"]) and isset($_REQUEST["tercEval"])) {
    if (!empty($_REQUEST["nombre"])and $_REQUEST["nombre"] != "" and is_numeric($_REQUEST["primEval"]) and is_numeric($_REQUEST["seguEval"]) and is_numeric($_REQUEST["tercEval"])) {
        $_SESSION[$_REQUEST["nombre"]]=array($_REQUEST["primEval"], $_REQUEST["seguEval"], $_REQUEST["tercEval"]);
        $tabla = creaTabla($_SESSION);
    } else {
        $tabla = "Alguno de los campos esta vacio o es incorrecto";
        if (!empty($_SESSION)) {
            $tabla .= "<br>".creaTabla($_SESSION);
        }
    }
}else if (!empty($_SESSION)) {
    $tabla = creaTabla($_SESSION);
}else {
    $tabla = "La sesion esta vacia";
}

function creaTabla($sesion) : string{
    $tabla = "<table style = 'border: 1px solid white'> <tr> <td style = 'border: 1px solid white'>Nombre</td> <td style = 'border: 1px solid white'>Primer</td> <td style = 'border: 1px solid white'>Segundo</td> <td style = 'border: 1px solid white'>Tercero</td> <td style = 'border: 1px solid white'>Media</td> </tr>";
    $usuarios = array_keys($sesion);
    
    foreach ($usuarios as $usuario) {
        $media = 0;
        $tabla .= "<tr>";
        $tabla .= "<td style = 'border: 1px solid white'>".htmlspecialchars($usuario)."</td>";

        for ($i=0; $i < count($sesion[$usuario]); $i++) { 
            $tabla .= "<td style = 'border: 1px solid white'>".round($sesion[$usuario][$i])."</td>";
            $media += $sesion[$usuario][$i];
        }
        $media /= count($sesion[$usuario]);
        $tabla .= "<td style = 'border: 1px solid white'>".round($media)."</td>";

        $tabla .= "</tr>";
    }

    $tabla .= "</table>";

    return $tabla;
}

?>

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
        <input type="text" name="nombre" id="nombre" placeholder="Nombre alumno">
        <input type="number" name="primEval" id="primEval" placeholder="Nota 1ª Evaluacion" max="10" min="0">
        <input type="number" name="seguEval" id="seguEval" placeholder="Nota 2ª Evaluacion" max="10" min="0">
        <input type="number" name="tercEval" id="tercEval" placeholder="Nota 3ª Evaluacion" max="10" min="0">
        <input type="submit" name="añadir" id="añadir" value="Añadir">
    </form>

    <h1>Lista de alumnos</h1>

    <?php echo $tabla ?>

    <br><a href="borrar.php">Borrar notas...</a>

</body>

</html>