<?php

$nombre = $_REQUEST["nombre"];
$email = $_REQUEST["email"];
$URL = $_REQUEST["URL"];
$sexo = $_REQUEST["sexo"];
$convivientes = $_REQUEST["convivientes"];
$aficiones = isset($_REQUEST["aficiones"]) ? $_REQUEST["aficiones"] : [];
$m_favorito = $_REQUEST["m_favorito"];

$tabla = "

<!DOCTYPE html>
<html lang='es' data-bs-theme='dark'

<head>
    <title>Resumen</title>
    <meta charset='UTF-8'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB' crossorigin='anonymous'>
</head>
<body>
    <table class='table'>
        <thead>
            <tr>
                <th scope = 'col'>Nombre y apellidos</th>
                <th scope = 'col'>Email</th>
                <th scope = 'col'>URL</th>
                <th scope = 'col'>Sexo</th>
                <th scope = 'col'>Convivientes del domicilio</th>
                <th scope = 'col'>Aficiones</th>
                <th scope = 'col'>Menú favorito</th>
            </tr>
        </thead>
        <tbody>
            <tr>
";

$tabla .= "<td>".$nombre."</td>";
$tabla .= "<td>".$email."</td>";
$tabla .= "<td>".$URL."</td>";
$tabla .= "<td>".$sexo."</td>";
$tabla .= "<td>".$convivientes."</td>";
if (!empty($aficiones)) {
    $tabla .= "<td>";
    for ($i=0; $i < count($aficiones); $i++) { 
        if ($i == count($aficiones)-1) {
            $tabla .= $aficiones[$i].".";
        }else {
            $tabla .= $aficiones[$i].", ";
        }        
    }
    $tabla .= "</td>";
}else{
    $tabla .= "<td>Ninguna</td>";
}
$tabla .= "<td>".$m_favorito."</td>";

$tabla .= "
            </tr>
        </tbody>
    <table>
</body>

</html>";

require("formulario.view.php");
?>