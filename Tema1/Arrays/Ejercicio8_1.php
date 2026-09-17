<?php

    $numeros[0] = rand(0, 99);   
    $repetido = FALSE;
    $menor;
    $mayor;
    $media = 0;

    for ($i=1; $i < 50 ; $i++) {
        $repetido = FALSE;

        $random = rand(0, 99);

        for ($j=0; $j < count($numeros); $j++) { 
            if ($numeros[$j]==$random) {
                $i--;
                $repetido = TRUE;
            }
        }

        if ($repetido==FALSE) {
            $numeros[$i] = $random;
        }
    }

    for ($k=0; $k < count($numeros); $k++) { 
        echo $numeros[$k].",";
    }

    sort($numeros);
    echo "<br><br>";

    for ($l=0; $l < count($numeros); $l++) { 
        echo $numeros[$l].",";
    }

    $mayor = $numeros[count($numeros)-1];

    echo "<br><br>";

    echo "El numero mayor es ".$mayor;

    $menor = $numeros[0];

    echo "<br><br>";

    echo "El numero menor es ".$menor;

    for ($p=0; $p < count($numeros); $p++) { 
        $media+=$numeros[$p];
    }
    $media/=count($numeros);

    echo "<br><br>";

    echo "La media es ".$media;
?>