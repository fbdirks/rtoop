<?php

/* de code van het object Som

Taken:
1. Op basis van de moeilijkheidsgraad bouwen van een som, teruggeven van de onderdelen en het goede antwoord.

*/

// NB: in deze eerste implementatie van Som ligt nog alles vast. 
// Later moeten de getallen 1 en 2, de bewerking en het antwoord natuurlijk
// willekeurig bepaald gaan worden. 

class Som {
	public $mg = 1;
	public $getal1 = 0;
	public $getal2 = 0;
	public $bewerking = "+";
	public $goede_antwoord = 1;
	public $eind = 20;

	function __construct($mg) {
		$this->mg = $mg;
		$this->getal1 = 2;
		$this->getal2 = 4;
		$this->bewerking = "+";
		$this->goede_antwoord = 8;
	}

}

?>
