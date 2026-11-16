<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$titulo = '';
$prioridad = '';
$modulos = ["login"];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = 0;
    $errores = [];
    $titulo = $_REQUEST["titulo"];
    $prioridad = $_REQUEST["prioridad"];
    $modulos = $_REQUEST["modulos"];
    $captura = $_FILES["capturaSubida"];

    compruebaTitulo($errores, $titulo);
    compruebaPrioridad($errores, $prioridad);
    compruebaModulos($errores, $modulos);
    compruebaCaptura($errores, $captura);

    if (count($errores) === 0) {

    $rutaCarpeta = __DIR__ . "/capturas";
    $rutaTXT = $rutaCarpeta . "/incidencias.txt";

    if (!is_writable($rutaCarpeta)) {
        die("No hay permisos de escritura en capturas");
    }

    $incidencias = file_exists($rutaTXT) ? file($rutaTXT) : [];
    $id = count($incidencias) + 1;

    if ($captura["type"] === "image/jpeg") {
        $extension = ".jpg";
    } elseif ($captura["type"] === "image/png") {
        $extension = ".png";
    } else {
        die("Formato de imagen no válido");
    }

    $nombreImagen = "captura_" . $id . $extension;
    $rutaImagen = $rutaCarpeta . "/" . $nombreImagen;
    $tituloImagen = "capturas/".$nombreImagen;

    if (!move_uploaded_file($captura["tmp_name"], $rutaImagen)) {
        die("No se ha podido guardar la imagen");
    }

    $datos = $id . ";"
        . date("d/m/Y H:i:s") . ";"
        . $_SERVER['SERVER_ADDR'] . ";"
        . $titulo . ";"
        . $prioridad . ";"
        . implode(",", $modulos) . ";"
        . $nombreImagen;

    if (file_put_contents($rutaTXT, $datos . PHP_EOL, FILE_APPEND) === false) {
        die("No se ha podido escribir en el TXT");
    }

    include_once("confirmacion.php");
}
}
include("nuevaIncidencia.view.php");

function compruebaTitulo(array &$errores, $titulo)
{
    if (!isset($titulo) || trim($titulo) === "") {
        $errores[] = ["titulo" => "El título es obligatorio"];
    } elseif (strlen($titulo) < 5 || strlen($titulo) > 50) {
        $errores[] = ["titulo" => "El título debe tener entre 5 y 50 caracteres"];
    } elseif (str_contains($titulo, ";")) {
        $errores[] = ["titulo" => "El título no puede contener ;"];
    }
}
function compruebaPrioridad(array &$errores, $prioridad)
{
    $prioridades = ["baja", "media", "alta"];
    if (!isset($prioridad)) {
        $errores[] = ["prioridad" => "Elige una prioridad"];
    } elseif (array_search($prioridad, $prioridades) === false) {
        $errores[] = ["prioridad" => "Elige una prioridad"];
    }
}
function compruebaModulos(array &$errores, $modulosSubidos)
{
    if (!isset($modulosSubidos)) {
        $errores[] = ["modulos" => "Marca al menos un modulo"];
    } elseif (!recorreModulos($modulosSubidos)) {
        $errores[] = ["modulos" => "Marca al menos un modulo"];
    }
}
function compruebaCaptura(array &$errores, $captura)
{
    if ($captura["error"] !== 0) {
        $errores[] = ["captura" => "Adjunta una captura"];
    } elseif ($captura["type"] !== "image/jpeg" && $captura["type"] !== "image/png") {
        $errores[] = ["captura" => "La captura debe ser JPEG o PNG"];
    } elseif ($captura["size"] > 200000) {
        $errores[] = ["captura" => "La captura no puede superar los 200 KB"];
    }
}
function recorreModulos(array $modulosSubidos)
{
    $modulos = ["login", "pagos", "informes", "perfil"];
    for ($i = 0; $i < count($modulosSubidos); $i++) {
        if (array_search($modulosSubidos[$i], $modulos) === false) {
            return false;
        }
    }
    return true;
}

?>