<?php

$valores[0] = 0;
$random = rand(0, 1);
$asociativo = array('M'=>0, 'F'=>0);

for ($i=0; $i < 100; $i++) { 

    if ($random == 0) {
        $valores[$i] = 'M';
    }else{
        $valores[$i] = 'F';
    }

    $random = rand(0, 1);

}

for ($j=0; $j < count($valores); $j++) { 
    if ($valores[$j]=='M') {
        $asociativo['M']++;
    }else {
        $asociativo['F']++;
    }
}

echo "Hay ".$asociativo['M']." M y ".$asociativo['F']." F";

?>