<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../Tema6_7/Controlador/VideojuegoController.php";
$controller = new VideojuegoController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;
if ($action == 'delete' && $id) {
    $controller->delete($id);
} elseif ($action == 'cambios' && $id) {
    header("location: Vista/videojuego_edit_view.php");
} elseif ($action == 'edit' && $id) {
    $controller->edit($id);
}else {
    $controller->index();
}
?>