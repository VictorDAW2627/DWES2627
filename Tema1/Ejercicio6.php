<?php

    $contador = 10;

    for ($i=1; $i<=100  ; $i++) { 
        if ($i<100) {
            echo $i.",";
        }else{
            echo $i.".<br><br>";
        }
    }

    while ($contador>=0) {
        if ($contador>0) {
            echo $contador."-";
        }else {
            echo $contador;
        }
        $contador--;
    }

?>