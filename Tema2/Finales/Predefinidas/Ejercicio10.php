<?php
$descartadas = 0;
echo "<table>";
if (!$fp = fopen("casas_rurales.csv", "r")) {
    echo "No se ha podido leer el archivo"; 
}else{
    while(!feof($fp)) {
        echo "<tr>";
        $linea = explode(";", fgets($fp));

        if ($linea[9]=="") {
            $descartadas++;
        }else {
            echo "<td>".$linea[0]."</td>";
            echo "<td>".$linea[1]."</td>";
            echo "<td>".$linea[3]."</td>";
            echo "<td>".$linea[9]."</td>";
        }
        echo "<tr>";
    }
}
echo "</table><br><br>";
echo "Se han descartado ".$descartadas." casas rurales";
fclose($fp);

?>