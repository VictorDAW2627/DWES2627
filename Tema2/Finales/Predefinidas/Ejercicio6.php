<?php

$frase = "Esta frase tiene letras y palabras separadas por espacios";
$frase = trim($frase);
$separadas = explode(" ", $frase);
$letras = 0;
$palabras = 0;

echo $frase."<br><br>";

if ($frase!="") {
    $palabras++;
}

for ($i=0; $i < strlen($frase); $i++) { 
    if ($frase[$i]==" ") {
        if ($frase[$i+1]!=" ") {
            $palabras++;
        }
    }else{
        $letras++;
    }
}

echo "La frase tiene ".$palabras." palabras y ".$letras." letras<br><br>";

foreach ($separadas as $palabra) {
    echo "El tamaño de la palabra '".$palabra."' es: ".strlen($palabra)."<br>";
}

?>