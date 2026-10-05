<?php

$plantillas = "plantillas.csv";

if (file_exists($plantillas)) {
    $jugadores = file($plantillas);
    $campos = explode(",", array_shift($jugadores));
    
    echo creaTabla($campos, jugadoresAtl_Madrid(organizaCSV($campos, $jugadores)));


} else {
    echo "El csv no existe";
}

function creaTabla($campos, $Atl_Madrid) : string{
    $tabla = "";

    $tabla .= "<table style = 'border: 1px solid black'>";
    $tabla .= "<tr>";
    for ($i=0; $i < count($campos); $i++) { 
        $tabla .= "<td style = 'border: 1px solid black'>".$campos[$i]."</td>";
    }
    $tabla .= "</tr>";
    for ($j=0; $j < count($Atl_Madrid); $j++) { 
        $claves = array_keys($Atl_Madrid[$j]);
        $tabla .= "<tr>";
            foreach ($claves as $campo) {
                $tabla .= "<td style = 'border: 1px solid black'>".$Atl_Madrid[$j][$campo]."</td>";
            }
        $tabla .= "</tr>";
    }
    $tabla .= "</table>";

    return $tabla;
    
}

function comparaDorsal($a, $b) : int {
    $claves = array_keys($a);

    foreach ($claves as $campo) {
        if ($campo=="Dorsal") {
            return $a[$campo] <=> $b[$campo];
        }
    }
}

function jugadoresAtl_Madrid($organizado) : array {
    $Atl_Madrid = array();

    for ($i=0; $i < count($organizado); $i++) { 
        $claves = array_keys($organizado[$i]);
        foreach ($claves as $campo) {
            if ($campo == "Equipo") {
                if ($organizado[$i][$campo]=="Atlético de Madrid") {
                    $Atl_Madrid[] = $organizado[$i];
                }
            }
        }
    }

    usort($Atl_Madrid,"comparaDorsal");

    return $Atl_Madrid;
}

function organizaCSV($campos, $jugadores) : array {
    $array = array();
        
    for ($i=0; $i < count($jugadores); $i++) { 
        $linea = explode(",", $jugadores[$i]);
        for ($j=0; $j < count($linea); $j++) { 
            $array[$i][$campos[$j]]=$linea[$j];
        }
    }

    return $array;
}


?>