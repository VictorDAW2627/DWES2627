<?php
require_once "../Tema6_7/Conexion/db.php";
class VideojuegoModel
{
    private $conexion;
    public function __construct(){
        // Obtenemos la conexión desde tu archivo db.php
        $this->conexion = obtenerConexion();
    }
    public function insertar($nombre, $genero, $precio){
        try {
            $sql = "INSERT INTO videojuegos (titulo, genero, precio) VALUES (:nombre, :genero, :precio)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':precio', $precio);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    public function borrar($id){
        
    }
    public function editar(){
        
    }
    public function obtenerTodos(){
        try {
            $sql = "SELECT * FROM videojuegos";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>