<?php

function intercambia(&$a, &$b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

$a = 10;
$b = 20;

echo $a.", ".$b."<br><br>";

intercambia($a, $b);

echo $a.", ".$b;

?>