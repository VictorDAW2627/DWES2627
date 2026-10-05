<?php

$usuarios = array("contraseñaSegura071205" => "usuarioSeguro", "1234" => "PacoPeña", "pruebaLogin45" => "v.ArrPer");
$correcto = true;
$mensaje = "";

if (empty($_REQUEST["usuario"])) {
    $mensaje .= "El usuario esta vacio. ";
    $correcto = false;
}
if (empty($_REQUEST["contraseña"])) {
    $mensaje .= "La contraseña esta vacia. ";
    $correcto = false;
}

if (!empty($_REQUEST["contraseña"]) and !empty($_REQUEST["usuario"])) {
    if (!compruebaUsuario(array_values($usuarios), $_REQUEST["usuario"])) {
        $mensaje .= "El usuario no existe. ";
        $correcto = false;
    }

    if (!compruebaContraseña(array_keys($usuarios), $_REQUEST["contraseña"]) and compruebaUsuario(array_values($usuarios), $_REQUEST["usuario"])) {
        $mensaje .= "La contraseña es incorrecta. ";
        $correcto = false;
    }   
}

if ($correcto == false) {
    include("ko.php");
} else {
    include("ok.php");
}


function compruebaContraseña($contraseñas, $req_contraseña): bool
{
    foreach ($contraseñas as $contraseña) {
        if ($contraseña == $req_contraseña) {
            return true;
        }
    }
    return false;
}

function compruebaUsuario($usuarios, $req_usuario): bool
{
    foreach ($usuarios as $usuario) {
        if ($usuario == $req_usuario) {
            return true;
        }
    }
    return false;
}
?>