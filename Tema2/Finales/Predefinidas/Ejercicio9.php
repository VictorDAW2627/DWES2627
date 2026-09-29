<?php

$cadena = "Ligar es ser agil";

echo "La palabra es: ".$cadena;

if (esPalindromo(strtolower($cadena))) {
    echo "<br><br>La palabra es un palíndromo";
} else {
    echo "<br><br>La palabra no es un palíndromo";
}

function esPalindromo(string $palabra) : bool {
    $j = strlen($palabra)-1;
    $i = 0;
    
    while ($i < $j) {
        if ($palabra[$i] == " ") {
            $i++;
        } else if ($palabra[$j] == " ") {
            $j--;
        } else if ($palabra[$i]!=$palabra[$j]) {
            return false;
        } else {
            $i++;
            $j--;
        } 
    }

    return true;
}

?>