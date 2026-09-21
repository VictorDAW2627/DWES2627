<?php

$coches = array(
    "111ABC"=>array("Ford", "Focus", 5),
    "333GHI"=>array("Volkswagen", "Polo", 5),
    "222DEF"=>array("Renault", "Clio", 5),    
    "444JKL"=>array("Subaru", "Crosstek", 5)
);

ksort($coches);

$claves = array_keys($coches);

echo "<table>";
foreach($claves as $clave){
    echo "<tr>";
    echo "<td>".$clave."</td>";
    for ($i=0; $i < count($coches[$clave]); $i++) { 
        echo "<td>".$coches[$clave][$i]."</td>";
    }
    echo "</tr>";
}
echo "</table>"; 

?>