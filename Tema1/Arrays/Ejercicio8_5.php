<?php

    $numeros[0][0] = rand(100, 999);

    for ($i=0; $i < 6; $i++) {

        for ($j=0; $j < 9; $j++) { 
            $repetido = FALSE;

            $random = rand(100, 999);

            for ($k=0; $k < count($numeros); $k++) { 
                for ($l=0; $l < count($numeros[$k]); $l++) { 
                    if ($random==$numeros[$k][$l]) {
                        $repetido = TRUE;
                        $j--;
                    }

                }

            }

            if ($repetido==FALSE) {
                $numeros[$i][$j] = $random;
            }

        }

        
         
    }

    for ($i=0; $i < count($numeros); $i++) { 
        for ($j=0; $j < count($numeros[$i]); $j++) { 
            if ($i == 0 and $j == 0) {
                $mayor = array($j=>$numeros[$i][$j]);
            } else {
                if ($numeros[$i][$j]>$mayor[array_key_first($mayor)]) {
                    $mayor = array($j=>$numeros[$i][$j]);
                }
            }
        }
    }

    for ($i=0; $i < count($numeros); $i++) { 
        for ($j=0; $j < count($numeros[$i]); $j++) { 
            if ($i == 0 and $j == 0) {
                $menor = array($i=>$numeros[$i][$j]);
            } else {
                if ($numeros[$i][$j]<$menor[array_key_first($menor)]) {
                    $menor = array($i=>$numeros[$i][$j]);
                }
            }
        }
    }

    echo "<table style='border: 1px solid black;'>";
    for ($i=0; $i < count($numeros); $i++) {        
        echo "<tr>";
            for ($j=0; $j < count($numeros[$i]); $j++) { 
                echo "<td>".$numeros[$i][$j]."</td>";                             
            }
        echo "</tr>";
    }
    echo "</table>";

?>