<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subido</title>
</head>
<body>
    <h1>La incidencia se ha registrado con exito</h1>
    <h2><?=htmlspecialchars($titulo)?></h2>
    <p>Prioridad: <?=$prioridad?></p>
    <h3>Modulos</h3>
    <ul>
        <?php 
        
        for ($i=0; $i < count($modulos); $i++) { 
            echo "<li>".$modulos[$i]."</li>";
        }
        
        ?>
    </ul>
    <img src="<?=$tituloImagen?>" alt="Incidencia">
    <?php header("Refresh:5; url=nuevaIncidencia.php")?>
</body>
</html>