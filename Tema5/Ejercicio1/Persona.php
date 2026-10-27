<?php 
namespace Clases\Ejercicio1;

class Persona {
    private $DNI;
    private $nombre;
    private $email;

    public function __construct($dni, $nombre, $email) {
        $this->DNI = $dni;
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function getDNI() {
        return $this->DNI;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setDNI($dni) {
        $this->DNI = $dni;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function mostrar() : string {
        return $this->DNI." - ".$this->nombre." - ".$this->email;
    }
}

?>