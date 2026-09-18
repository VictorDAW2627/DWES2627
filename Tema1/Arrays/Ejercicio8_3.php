<?php

$personas = array(
    array('nombre'=>'Aitor', 'altura'=>182, 'email'=>'aitor@correo.com'),
    array('nombre'=>'Carlos', 'altura'=>191, 'email'=>'carlos@correo.com'),
    array('nombre'=>'Sandra', 'altura'=>163, 'email'=>'sandra@correo.com'),
    array('nombre'=>'Laura', 'altura'=>174, 'email'=>'laura@correo.com'),
    array('nombre'=>'Fernando', 'altura'=>169, 'email'=>'fernando@correo.com')
);

echo "<table>";
for ($i=0; $i < count($personas); $i++) { 
    echo "<tr>";
    for ($j=0; $j < count($personas[$i]); $j++) { 
        echo "<td>".$personas[$i][$j]."</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>