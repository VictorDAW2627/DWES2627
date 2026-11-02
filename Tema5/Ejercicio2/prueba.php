<?php
namespace Clases\Ejercicio2;
include_once("Player.php");
include_once("Team.php");

$plantillas = "plantillas.csv";

if (file_exists($plantillas)) {
    $jugadores = file($plantillas);
    $campos = explode(",", array_shift($jugadores));
    $atletico = jugadoresAtl_Madrid(organizaCSV($campos, $jugadores));
    $equipo = rellenaEquipo($atletico);

} else {
    echo "El csv no existe";
}

function rellenaEquipo($atletico): Team
{
    $equipo = new Team("Atlético de Madrid", 0, 0, 0, 0, 0, 0);

    for ($i = 0; $i < count($atletico); $i++) {
        $campos = array_keys($atletico[$i]);
        foreach ($campos as $campo) {
            switch ($campo) {
                case 'Nombre':
                    $nombre = $atletico[$i][$campo];
                    break;
                case 'Fecha':
                    $cumpleaños = $atletico[$i][$campo];
                    break;
                case 'Pais':
                    $pais = $atletico[$i][$campo];
                    break;
                case 'Dorsal':
                    $dorsal = $atletico[$i][$campo];
                    break;
                case 'Posicion':
                    $posicion = $atletico[$i][$campo];
                    break;
                case 'PS':
                    $goles = $atletico[$i][$campo];
                    break;
                case 'PJ':
                    $partidos = $atletico[$i][$campo];
                    break;
                case 'PC':
                    $minutos = $atletico[$i][$campo];
                    break;
                case 'M':
                    $amarillas = $atletico[$i][$campo];
                    break;
                case 'G':
                    $rojas = $atletico[$i][$campo];
                    break;
            }
        }
        $jugador = new Player($nombre, $cumpleaños, $pais, $dorsal, $posicion, $partidos, $goles);
        $jugador->playMinutes($minutos);
        for ($i=0; $i < $amarillas; $i++) { 
            $jugador->addCard(0);
        }
        for ($i=0; $i < $rojas; $i++) { 
            $jugador->addCard(1);
        }
        $equipo->signPlayer($jugador);
    }
    return $equipo;
}

function jugadoresAtl_Madrid($organizado): array
{
    $Atl_Madrid = array();

    for ($i = 0; $i < count($organizado); $i++) {
        $claves = array_keys($organizado[$i]);
        foreach ($claves as $campo) {
            if ($campo == "Equipo") {
                if ($organizado[$i][$campo] == "Atlético de Madrid") {
                    $Atl_Madrid[] = $organizado[$i];
                }
            }
        }
    }

    return $Atl_Madrid;
}

function organizaCSV($campos, $jugadores): array
{
    $array = array();

    for ($i = 0; $i < count($jugadores); $i++) {
        $linea = explode(",", $jugadores[$i]);
        for ($j = 0; $j < count($linea); $j++) {
            $array[$i][$campos[$j]] = $linea[$j];
        }
    }

    return $array;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>

<body>

<?php echo $equipo->render() ?>

</body>

</html>