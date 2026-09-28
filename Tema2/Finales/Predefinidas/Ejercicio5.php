<?php

$frase = "No me gustan los numeros pares";
$impares="";

echo $frase."<br><br>";

for ($i=0; $i < strlen($frase); $i++) { 
    if ($i%2==0) {
        $impares .= $frase[$i];
    }
}

echo $impares;

?>