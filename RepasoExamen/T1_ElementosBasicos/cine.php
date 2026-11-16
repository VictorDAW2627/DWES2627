<?php

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
        "libres" => $libres
    ];
}

$ocupadas = 0;
$libres = 0;

for ($j = 0; $j < BUTACAS; $j++) {      // columna por fuera
    $ocupadas = 0;
    for ($i = 0; $i < FILAS; $i++) {    // filas por dentro
        if ($sala[$i][$j] === 1) { $ocupadas++; }
    }
    $columnas[$j] = ["ocupadas" => $ocupadas];
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