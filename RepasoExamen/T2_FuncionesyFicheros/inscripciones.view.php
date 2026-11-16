<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inscripciones</title>
</head>

<body>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Fecha de Nacimiento</th>
            <th>Teléfono</th>
            <th>Email</th>
        </thead>
        <tbody>
            <?php

            for ($i = 0; $i < count($validas); $i++) {
                echo "<tr>";
                echo "<td>" . $validas[$i]["nombre"] . "</td>";
                echo "<td>" . $validas[$i]["fecha"] . "</td>";
                echo "<td>" . $validas[$i]["teléfono"] . "</td>";
                echo "<td>" . $validas[$i]["email"] . "</td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
    <?php 
    $claves = array_keys($errores);
    foreach ($claves as $clave) {
        echo "<p>Línea ". $clave .": ".$errores[$clave]."</p>";
    }
    echo "<br>";
    echo "<p>Líneas leídas: ".(count($errores)+count($validas))."</p>";
    echo "<p>Inscripciones válidas: ".count($validas)."</p>";
    echo "<p>Líneas descartadas: ".count($errores)."</p>";
    
    ?>
</body>

</html>