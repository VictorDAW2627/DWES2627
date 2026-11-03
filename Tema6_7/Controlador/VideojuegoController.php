<?php

require_once "../Tema6_7/Modelos/VideojuegoModel.php";
class VideojuegoController
{
    private $modelo;
    public function __construct(){
        $this->modelo = new VideojuegoModel();
    }
    public function index(){
        $mensaje = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $genero = $_POST['genero'];
            $precio = $_POST['precio'];
            $exito = $this->modelo->insertar($nombre, $genero, $precio);
            $mensaje = $exito ? "¡Videojuego guardado con éxito!" : "Error al guardar el videojuego.";
        }
        $videojuegos = $this->modelo->obtenerTodos();
        require_once "../Tema6_7/Vista/videojuego_view.php";
    } 
    public function create(){
        
    }
    public function delete(){
        
    }
    public function edit(){
        
    }
}
?>