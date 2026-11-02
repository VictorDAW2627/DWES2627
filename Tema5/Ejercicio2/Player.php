<?php 
namespace Clases\Ejercicio2;
class Player{
    private $name;
    private $birthday;
    private $country;
    private $dorsal;
    private $position;
    private $goals;
    private $matches;
    private $minutes;
    private $yellowCard;
    private $redCard;

    public function __construct($name, string $birthday, $country, $dorsal, $position, $matches, $goals) {
        $this->name=$name;
        $this->birthday=$birthday;
        $this->country=$country;
        $this->dorsal=$dorsal;
        $this->position=$position;
        $this->matches=$matches;
        $this->goals=$goals;
        $this->minutes=0;
        $this->yellowCard=0;
        $this->redCard=0;        
    }
    public function age(){
        $cumpleaños = new DateTimeImmutable($this->birthday);
        return $cumpleaños->format('Y')-date('Y');
    }
    public function score(){
        return $this->goals/$this->matches;
    }
    public function addCard(int $colour){
        if ($colour==0) {
            $this->yellowCard++;
        }else {
            $this->redCard++;
        }
    }
    public function playMinutes(int $min){
        $this->minutes=$min;
    }
    public function render(){
        return $this->name."-".$this->age()."-".$this->country."-".$this->dorsal."-".$this->position."-".$this->goals."-".$this->matches."-".$this->minutes."-".$this->yellowCard."-".$this->redCard;
    }
}


?>