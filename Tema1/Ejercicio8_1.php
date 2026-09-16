<?php

    $numeros[];   
    $repetido;

    for ($i=0; $i <50 ; $i++) {
        $repetido = false;

        $random = rand(0, 99);

        for ($j=0; $j < count($numeros); $j++) { 
            if ($numeros[j]==$random) {
                $i--;
                $repetido = true;
            }
        }

        if (!$repetido) {
            $numeros[i] = $random;
        }
    }

    for ($i=0; $i < count($numeros); $i++) { 
        echo $numeros[i].",";
    }

?>