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
        try {
            $sql = "DELETE FROM videojuegos WHERE id=:id";
            $stmt = $this->conexion->prepare($sql);;
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            return false;
        }
    }
    public function editar($id, $nombre, $genero, $precio){
        try {
            $sql = "UPDATE videojuegos SET titulo = :titulo, genero = :genero, precio = :precio WHERE id = :id";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute(['titulo' => $nombre, 'genero' => $genero, 'precio' => $precio, 'id' => $id]);            
        } catch (PDOException $e) {
            return false;
        }
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
    public function obtenerPorID($id){
        try {
            $sql = "SELECT * FROM videojuegos WHERE id = $id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>