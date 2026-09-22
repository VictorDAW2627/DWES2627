<?php

function cuenta($a, $b) {
    if ($a<$b) {
        for ($a; $a <= $b; $a++) { 
            echo $a.", ";
        }
    }else{
        for ($b; $b <= $a; $b++) { 
            echo $b.", ";
        }
    }
}

cuenta(10, 20);

?>