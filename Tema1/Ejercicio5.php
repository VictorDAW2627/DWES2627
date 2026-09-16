<?php

    $nota1 = 5.5;
    $nota2 = 7;
    $nota3 = 9.9;

    if ($nota1>$nota2 and $nota1>$nota3) {
        echo "La 1ª nota es mayor (".$nota1.")";
    }else if ($nota2>$nota3) {
        echo "La 2ª nota es mayor (".$nota2.")";
    }else{
        echo "La 3ª nota es mayor (".$nota3.")";
    }

?>