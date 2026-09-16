<?php

    $numeros[0] = rand(0, 99);   
    $repetido = FALSE;

    for ($i=1; $i <50 ; $i++) {
        $repetido = FALSE;

        $random = rand(0, 99);

        for ($j=0; $j < count($numeros); $j++) { 
            if ($numeros[j]==$random) {
                $i--;
                $repetido = TRUE;
            }
        }

        if ($repetido==FALSE) {
            $numeros[$i] = $random;
        }
    }

    for ($k=0; $k < count($numeros); $++) { 
        echo $numeros[$i].",";
    }

?>