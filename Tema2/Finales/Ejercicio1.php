<?php

function mayor() : int {
    if (func_num_args()==0) {
        return 0;
    }

    $mayor = func_get_arg(0);

    for ($i=0; $i < func_num_args(); $i++) { 
        if (func_get_arg($i)>$mayor) {
            $mayor = func_get_arg($i);
        }
    }
    return $mayor;
}

echo mayor(12, 67, 99, 48);

?>