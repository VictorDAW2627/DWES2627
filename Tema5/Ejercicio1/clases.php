<?php 
/*ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);*/
namespace Clases\Ejercicio1;
include_once("Persona.php");
include_once("Estudiante.php");

$persona = new Persona("49353520M", "Victor Arribas Perez", "titroles@gmail.com");
$estudiante = new Estudiante("49353520M", "Victor Arribas Perez", "titroles@gmail.com", 10837011);
$persona->setEmail("vicarrper@alu.edu.gva.es");
$estudiante->setNumExp(11073801);
echo $persona->mostrar()."<br><br>";
echo $estudiante->mostrar();
?>