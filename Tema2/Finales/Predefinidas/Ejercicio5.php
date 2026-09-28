<?php

$frase = "Las letras pares son minusculas";

echo $frase."<br><br>";

for ($i=0; $i < strlen($frase); $i++) { 
    if ($i%2==0) {
        $frase[$i] = strtoupper($frase[$i]);
    }
}

echo $frase;

?>