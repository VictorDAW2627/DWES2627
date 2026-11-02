<?php 
namespace Clases\Ejercicio2;
include_once("Player.php");

class Team{
    private $name;
    private $players;
    private $matches;
    private $won;
    private $lost;
    private $tie;
    private $scoreGoals;
    private $concededGoals;

    public function __construct($name, $matches, $won, $lost, $tie, $scoreGoals, $concededGoals) {
        $this->name=$name;
        $this->players = [];
        $this->matches=$matches;
        $this->won=$won;
        $this->lost=$lost;
        $this->tie=$tie;
        $this->scoreGoals=$scoreGoals;
        $this->concededGoals=$concededGoals;
    }
    public function signPlayer(Player $player){
        array_push($this->players, $player);
    }
    public function render():string{
        $detalles = "<p>Team: ".$this->name."<p>";
        $detalles .= "<p>Matches: ".$this->matches."<p>";
        $detalles .= "<p>Won: ".$this->won."<p>";
        $detalles .= "<p>Lost: ".$this->lost."<p>";
        $detalles .= "<p>Tie: ".$this->tie."<p>";
        $detalles .= "<p>Score Goals: ".$this->scoreGoals."<p>";
        $detalles .= "<p>Conceded Goals: ".$this->concededGoals."<p>";
        $detalles .= "<p>Players: <p>";
        $detalles.= "<table>";
        $detalles .= "<tr>";
        $detalles.="<td>Player</td>";
        $detalles.="<td>Age</td>";
        $detalles.="<td>Country</td>";
        $detalles.="<td>Dorsal</td>";
        $detalles.="<td>Position</td>";
        $detalles.="<td>Goals</td>";
        $detalles.="<td>Matches</td>";
        $detalles.="<td>Minutes</td>";
        $detalles.="<td>Yellow Cards</td>";
        $detalles.="<td>Red Cards</td>";
        $detalles .= "</tr>";

        foreach ($this->players as $player) {
            $jugador = explode("-", $player->render());
            $detalles .= "<tr>";
            for ($i=0; $i < count($jugador); $i++) { 
                $detalles.="<td>".$jugador[$i]."</td>";
            }
            $detalles .= "</tr>";
            
        }
        $detalles.="</table>";

        return $detalles;
    }
}


?>