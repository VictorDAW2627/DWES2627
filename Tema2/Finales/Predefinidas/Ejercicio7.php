<?php

$frase = "Esta frase tiene letras y palabras separadas por espacios";
$frase = trim($frase);
$separadas = explode(" ", $frase);
$letras = 0;

echo $frase."<br><br>";

for ($i=0; $i < strlen($frase); $i++) { 
    if ($frase[$i]!=" ") {
        $letras++;    
    }
}

echo "La frase tiene ".str_word_count($frase)." palabras y ".$letras." letras<br><br>";

foreach ($separadas as $palabra) {
    echo "El tamaño de la palabra '".$palabra."' es: ".strlen($palabra)."<br>";
}

?>