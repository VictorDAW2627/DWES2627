<!DOCTYPE = "html">
<h1>Contadores</h1>
<p>Este contador va del 1 al 100</p><br>
<?php

    $contador = 10;

    for ($i=1; $i<=100  ; $i++) { 
        if ($i<100) {
            echo $i.",";
        }else{
            echo $i.".<br><br>";
        }
    }

?>

<p>Este otro va del 10 al 0</p><br>

<?php

    while ($contador>=0) {
        if ($contador>0) {
            echo $contador."-";
        }else {
            echo $contador;
        }
        $contador--;
    }

?>