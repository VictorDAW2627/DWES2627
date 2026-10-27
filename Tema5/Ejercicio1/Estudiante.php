<?php 
namespace Clases\Ejercicio1;

class Estudiante extends Persona{
    private $numExpediente;

    public function __construct($dni, $nombre, $email, $numExp) {
        parent::__construct($dni, $nombre, $email);
        $this->numExpediente = $numExp;
    }

    public function getNumExp() {
        return $this->numExpediente;
    }

    public function setNumExp($numExp) {
        $this->numExpediente = $numExp;
    }

    public function mostrar() : string {
        return parent::mostrar()." - ".$this->numExpediente;
    }
}

?>