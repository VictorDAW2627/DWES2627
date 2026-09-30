<?php

echo "<table>";
    if (!$plantilla = fopen("plantillas.csv","r")) {
        echo "No se ha podido leer el archivo";
    }else {
        while (!feof($plantilla)) {
            $linea = explode(",", fgets($plantilla));

            if (count($linea)!=1) {
                echo "<tr>";
                
                echo "</tr>";
            }
        }
    }
echo "</table>";

?>