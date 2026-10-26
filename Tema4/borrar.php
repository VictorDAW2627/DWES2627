<?php
$_SESSION = [];
session_start();
session_destroy();
header("location: Ejercicio3.php")
?>