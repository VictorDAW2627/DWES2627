<?php

require_once("biblioteca.php");
$errores = [];
$validas = [];

if (file_exists("inscripciones.txt")) {
    $inscripciones = file("inscripciones.txt");
    for ($i = 0; $i < count($inscripciones); $i++) {
        if (trim($inscripciones[$i]) != "") {
            $linea = explode(";", $inscripciones[$i]);
            for ($j = 0; $j < count($linea); $j++) {
                $linea[$j] = trim($linea[$j]);
            }

            if (count($linea) === 4) {
                if (!nombreValido($linea[0])) {
                    registraError($errores, $i + 1, "nombre no válido");
                } elseif (!fechaValida($linea[1])) {
                    registraError($errores, $i + 1, "fecha no válida");
                } elseif (!telefonoValido($linea[2])) {
                    registraError($errores, $i + 1, "teléfono no válido");
                } elseif (!emailValido($linea[3])) {
                    registraError($errores, $i + 1, "email no válido");
                } else {
                    $validas[] = [
                        "nombre" => $linea[0],
                        "fecha" => $linea[1],
                        "teléfono" => $linea[2],
                        "email" => $linea[3]];
                }
            } else {
                registraError($errores, $i + 1, "numero de campos incorrecto");
            }
        }
    }
}
include("inscripciones.view.php");

?>