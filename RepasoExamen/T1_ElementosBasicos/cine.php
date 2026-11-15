<?php
/* Una sala de cine tiene 8 filas con 12 butacas cada una. 
Define como constantes estos tamaños y el número de butacas ocupadas (40). 
Guarda el estado de la sala en un array bidimensional donde cada butaca vale 0 (libre) o 1 (ocupada).

Crea la sala con todas las butacas libres y después ocupa 40 butacas elegidas al azar.

No se puede ocupar dos veces la misma: al terminar tienen que quedar exactamente 40 ocupadas y 56 libres.

Calcula cuántas butacas libres tiene cada fila y cuántas ocupadas tiene cada columna. Guarda los totales en dos arrays (nada de una variable distinta para cada fila o columna).

Averigua qué fila tiene más butacas libres y qué columna tiene más butacas ocupadas. Si hay empate, vale la primera.

Muestra la sala en una tabla HTML con una celda por butaca (la letra L si está libre, O si está ocupada) y el texto en estos colores:
Verde: todas las butacas de la fila con más libres.
Rojo: todas las butacas de la columna con más ocupadas.
Azul: la butaca donde se cruzan ambas.
Negro: el resto.

Debajo de la tabla, muestra un resumen guardado en un array asociativo y recorrido con foreach. Numera filas y columnas desde 1 al mostrarlas, aunque en el array empiecen en 0. Debe quedarte algo como esto. Los números de fila y columna cambiarán en cada ejecución, pero siempre habrá 56 libres y 40 ocupadas:

Butacas libres: 56
Butacas ocupadas: 40
Fila con más butacas libres: 3 (9 libres)
Columna con más butacas ocupadas: 7 (6 ocupadas) */

const FILAS = 8;
const BUTACAS = 12;
const OCUPADAS = 40;
$sala = array_fill(0, FILAS, array_fill(0, BUTACAS, 0));
$fila;
$butaca;
$filas = [];
$columnas = [];
$ocupadas = 0;
$libres = 0;
$cont = 0;
$filaLibre;
$columnaOcupada;
$index;

for ($i = 0; $i < OCUPADAS; $i++) {
    $fila = rand(0, FILAS - 1);
    $butaca = rand(0, BUTACAS - 1);
    if ($sala[$fila][$butaca] === 1) {
        $i--;
    } else {
        $sala[$fila][$butaca] = 1;
    }
}

for ($i = 0; $i < count($sala); $i++) {
    $ocupadas = 0;
    $libres = 0;
    for ($j = 0; $j < count($sala[$i]); $j++) {
        if ($sala[$i][$j] === 1) {
            $ocupadas++;
        } else {
            $libres++;
        }
    }
    $filas[$i] = [
        "ocupadas" => $ocupadas,
        "libres" => $libres
    ];
}

$ocupadas = 0;
$libres = 0;

for ($i = 0; $i <= count($sala); $i++) {
    if ($i === count($sala) && $cont === 12) {
        break;
    } elseif ($i === count($sala)) {
        if ($sala[$i][$cont] === 1) {
            $ocupadas++;
        } else {
            $libres++;
        }
        $columnas[$cont] = [
            "ocupadas" => $ocupadas,
            "libres" => $libres
        ];
        $i = 0;
        $cont++;
        $ocupadas = 0;
        $libres = 0;
    } else {
        if ($sala[$i][$cont] === 1) {
            $ocupadas++;
        } else {
            $libres++;
        }
    }

}

for ($i=0; $i < count($filas); $i++) { 
    if ($i===0) {
        $index=0;
        $cont = $filas[0]['libres'];
    }elseif ($filas[$i]['libres']>$cont) {
        $index = $i;
        $cont = $filas[$i]['libres'];
    }
}
$filaLibre = [$index, $cont];

for ($i=0; $i < count($columnas); $i++) { 
    if ($i===0) {
        $index=0;
        $cont = $columnas[0]['ocupadas'];
    }elseif ($columnas[$i]['ocupadas']>$cont) {
        $index = $i;
        $cont = $columnas[$i]['ocupadas'];
    }
}
$columnaOcupada = [$index, $cont];
$ocupadas = 0;
$libres = 0;

for ($i=0; $i < count($sala); $i++) { 
    for ($j=0; $j < count($sala[$i]); $j++) { 
        if ($sala[$i][$j] === 1) {
            $ocupadas++;
        } else {
            $libres++;
        }
    }
}

echo "<table style='border: 1px solid black; color: white; border-collapse: collapse;'>";
for ($i=0; $i < count($sala); $i++) { 
    if ($i === $filaLibre[0]) {
        echo "<tr style = 'background-color: green'>";
    }else {
        echo "<tr style = 'background-color: black;'>";
    }
    for ($j=0; $j < count($sala[$i]); $j++) { 
        if ($i === $filaLibre[0]&&$j=== $columnaOcupada[0]) {
            echo "<td style='background-color: turquoise; color: black;'>";
            if ($sala[$i][$j]===0) {
                echo"L</td>";
            }else {
                echo"O</td>";
            }
        }elseif ($j=== $columnaOcupada[0]) {
            echo "<td style='background-color: red'>";
            if ($sala[$i][$j]===0) {
                echo"L</td>";
            }else {
                echo"O</td>";
            }
        }else {
            echo "<td>";
            if ($sala[$i][$j]===0) {
                echo"L</td>";
            }else {
                echo"O</td>";
            }
        }
    }
    echo "</tr>";
}
echo "</table>";

echo "<br>Butacas libres: ".$libres;
echo "<br>Butacas ocupadas: ".$ocupadas;
echo "<br>Fila con más butacas libres: ".($filaLibre[0]+1)." (".$filaLibre[1]." libres)";
echo "<br>Columna con más butacas ocupadas: ".($columnaOcupada[0]+1)." (".$columnaOcupada[1]." ocupadas)";

?>