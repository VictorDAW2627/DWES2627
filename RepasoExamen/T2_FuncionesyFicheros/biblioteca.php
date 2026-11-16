<?php
function nombreValido(string $nombre): bool
{
    if (trim($nombre) == "") {
        return false;
    }

    for ($i = 0; $i < strlen($nombre); $i++) {
        if (!ctype_alpha($nombre[$i]) && !ctype_space($nombre[$i])) {
            return false;
        }
    }

    return true;
}
function fechaValida(string $fecha, string $separador = "/"): bool
{
    $dia = 0;
    $mes = 0;
    $año = 0;

    if (str_contains($fecha, $separador) && substr_count($fecha, $separador) === 2) {
        $fechas = explode($separador, $fecha);
        for ($i = 0; $i < count($fechas); $i++) {
            switch ($i) {
                case 0:
                    $dia = intval($fechas[$i]);
                    break;

                case 1:
                    $mes = intval($fechas[$i]);
                    break;

                case 2:
                    $año = intval($fechas[$i]);
                    break;
            }
        }
        if (checkdate($mes, $dia, $año)) {
            return true;
        }
    }
    return false;
}
function telefonoValido(string $telefono): bool
{
    if (ctype_digit($telefono) && strlen($telefono) === 9) {
        return true;
    }
    return false;
}
function emailValido(string $email): bool
{
    if (str_contains($email, "@") && substr_count($email, "@") === 1) {
        $mail = explode("@", $email);
        if (str_contains($mail[1], ".")) {
            return true;
        }
    }
    return false;
}
function registraError(array &$errores, int $linea, string $motivo)
{
    $errores[$linea] = $motivo;
}

?>