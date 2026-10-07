<?php
echo"<table style = 'border: 1px solid black'>";
foreach (array_keys($_GET) as $clave) {
    echo"<tr>";
        echo "<td style = 'border: 1px solid black'>".$clave."</td>";
        echo "<td style = 'border: 1px solid black'>".$_GET[$clave]."</td>";
    echo"</tr>";    
}
echo"</table>";
echo "Suma: ".$suma;
echo "<br>Resta: ".$resta;
echo "<br>Multiplicacion: ".$multiplicacion;
echo "<br>Division: ".$division."<br>";
echo"<table style = 'border: 1px solid black'>";
foreach (array_keys($_SERVER) as $clave) {
    echo"<tr>";
        echo "<td style = 'border: 1px solid black'>".$clave."</td>";
        echo "<td style = 'border: 1px solid black'>".$_SERVER[$clave]."</td>";
    echo"</tr>";
}
echo"</table>";
echo "El ordenador que hace la peticion es ".$_SERVER['REMOTE_ADDR'];
echo "<br>Las variables de los parametros son: ".$_SERVER['QUERY_STRING'];
echo "<br>La ruta del sitio web en el ordenador local es ".$_SERVER['DOCUMENT_ROOT'];
?>