<?php

/* de code van het object Som

Taken:
1. Op basis van de moeilijkheidsgraad bouwen van een som, teruggeven van de onderdelen en het goede antwoord.

*/

class Som {
	public $mg = 1;
	public $getal1 = 0;
	public $getal2 = 0;
	public $bewerking = "+";
	public $goede_antwoord = 1;

	function __construct($mg) {
		$this->getal1 = rand(1,10);
		$this->getal2 = rand(1,10);
		$soort = rand(1,4);

		switch($soort) {
		case 1:
			$this->bewerking = "+";
			$goede_antwoord = $this->getal1 + $this->getal2;
		case 2:
			$this->bewerking = "-";
			if ($this->getal1 < $this->getal2) {
				$wissel = $this->getal1;
				$this->getal1 = $this->getal2;
				$this->getal2 = $wissel;
			}

			$this->goede_antwoord = $this->getal1 + $this->getal2;
		case 3:
			$this->bewerking = "*";
			$goede_antwoord = $this->getal1 * $this->getal2;
		case 4:
			$this->bewerking = "/";
			if ($this->getal1 < $this->getal2) {
				$wissel = $this->getal1;
				$this->getal1 = $this->getal2;
				$this->getal2 = $wissel;
			}
			$goede_antwoord = $this->getal1 / $this->getal2;
		}

		

	}



}

?>
