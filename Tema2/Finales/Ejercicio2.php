<?php

$fecha = "21:30:12";

function compruebaHora(string $fecha) {
    trim($fecha);
    $valores = array();
    $separador = 0;

    for ($i=0; $i < strlen($fecha); $i++) { 
        if ($fecha[$i]==':' or $i == strlen($fecha)-1) {
            $valores[]=substr($fecha,$separador,2);
            $separador = $i+1;
        }
    }

    if ($valores[0]<0 or $valores[0]>24) {
        return "La hora no es valida";
    }else if ($valores[1]<0 or $valores[1]>60){
        return "Los minutos no son validos";
    }elseif ($valores[2]<0 or $valores[2]>60) {
        return "Los segundos no son validos";
    }else {
        return "La hora es valida, las horas son ". $valores[0].", los minutos " .$valores[1]." y los segundos ". $valores[2];
    }
}

echo compruebaHora($fecha);

?>