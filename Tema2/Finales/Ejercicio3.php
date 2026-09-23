<?php

function digitos(int $num) : int {
    return strlen(strval($num));
}

function digitoN(int $num, int $pos) : int {
    for ($i=1; $i <= strlen(strval($num)); $i++) { 
        if ($i==$pos) {
            return intval(strval($num)[$i-1]);
        }
    }
    return -1;
}

function quitaPorDetras(int $num, int $cant) : int {
    return intval(substr(strval($num), 0, strlen(strval($num))-$cant));
}

function quitaPorDelante(int $num, int $cant) : int {
    return intval(substr(strval($num), strlen(strval($num)-1)-$cant, $cant));
}

echo digitos(1234)."/".digitoN(4321, 4)."/".quitaPorDetras(1234, 2)."/".quitaPorDelante(4321, 2);

?>