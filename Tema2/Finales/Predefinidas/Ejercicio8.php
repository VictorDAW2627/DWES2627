<?php

$frase = "Escribe una funcion que transforme una cadena en cani.";

echo $frase."<br><br>";

echo cadenaCani($frase);

function cadenaCani(string $cadena) : string {
    //Preguntar a Pepe por caracteres con tilde
    $esMayuscula = true;

    for ($i=0; $i < strlen($cadena); $i++) { 
        if ($cadena[$i]!=" ") {
            if ($esMayuscula) {
                $cadena[$i] = strtoupper($cadena[$i]);
                $esMayuscula = false;
            } else {
                $esMayuscula = true;
            }
        }
    }

    return $cadena;
}

?>