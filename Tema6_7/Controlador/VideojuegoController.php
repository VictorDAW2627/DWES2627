<?php

require_once "../Tema6_7/Modelos/VideojuegoModel.php";
class VideojuegoController
{
    private $modelo;
    public function __construct()
    {
        $this->modelo = new VideojuegoModel();
    }
    public function index()
    {
        $mensaje = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $genero = $_POST['genero'];
            $precio = $_POST['precio'];
            $exito = $this->modelo->insertar($nombre, $genero, $precio);
            $mensaje = $exito ? "¡Videojuego guardado con éxito!" : "Error al guardar el videojuego.";
        }
        $videojuegos = $this->modelo->obtenerTodos();
        require_once "../Tema6_7/Vista/videojuego_view.php";
    }
    public function delete($id)
    {
        $mensaje = "";
        if (isset($id)) {
            $exito = $this->modelo->borrar($id);
            $mensaje = $exito ? "¡Videojuego borrado con éxito!" : "Error al borrar el videojuego.";
        }
        $videojuegos = $this->modelo->obtenerTodos();
        require_once "../Tema6_7/Vista/videojuego_view.php";
    }
    public function edit($id)
    {
        $mensaje = "";
        $videojuegos = $this->modelo->obtenerTodos();
        $juego = $this->modelo->obtenerPorID($id);

        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
        } else {
            $nombre = $juego[0]['titulo'];
            echo $nombre;
        }

        if (isset($_POST['genero'])) {
            $genero = $_POST['genero'];
        } else {
            $genero = $juego[0]['genero'];
            echo $genero;
        }

        if (isset($_POST['precio'])) {
            $precio = $_POST['precio'];
        } else {            
            $precio = $juego[0]['precio'];
            echo $precio;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($id)) {
            $exito = $this->modelo->editar($id, $nombre, $genero, $precio);
            $mensaje = $exito ? "¡Videojuego editado con éxito!" : "Error al editar el videojuego.";
        }
        $videojuegos = $this->modelo->obtenerTodos();
        require_once "../Tema6_7/Vista/videojuego_view.php";
    }

    public function cambios($id)
    {
        $videojuegos = $this->modelo->obtenerTodos();
        require_once "../Tema6_7/Vista/videojuego_edit_view.php";
    }
}
?>