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
	public $eind = 20;

	function __construct($mg) {
		
		// einde bepalen
		if ($mg == 1) {
			$this->eind = 20;
			$this->berekeningen = 2;
		} elseif ($mg == 2) {
			$this->eind = 50;
			$this->berekeningen = 3;
		} else {
			$this->eind = 100;
			$this->berekeningen = 4;
		}
		
		// soort berekening bepalen
		$soort = rand(1,$this->berekeningen); 

		switch($soort) {
		case 1:
			$this->bewerking = "+";
			do {
				$this->willekeurige_getallen();
				$this->bewerking = "+";
				$this->goede_antwoord = $this->getal1 + $this->getal2;
			} while ($this->goede_antwoord >= $this->eind);
			break; # was ik eerst vergeten....
		case 2:
			$this->bewerking = "-";
			do {
				$this->willekeurige_getallen();
				$this->wissel_getallen();
				$this->goede_antwoord = $this->getal1 - $this->getal2;	
			} while ($this->goede_antwoord >= $this->eind);
			break;
		case 3:
			$this->bewerking = "*";
			do {
				$this->willekeurige_getallen();
				$this->goede_antwoord = $this->getal1 * $this->getal2;
			} while ($this->goede_antwoord >= $this->eind);
			break;
		case 4:
			$this->bewerking = "/";
			do {
				$this->willekeurige_getallen();
				if ($this->getal1 < $this->getal2) {
					$wissel = $this->getal1;
					$this->getal1 = $this->getal2;
					$this->getal2 = $wissel;
				}
				$this->goede_antwoord = $this->getal1 * $this->getal2;
				//print "$this->goede_antwoord $this->getal1 / $this->getal2 <br>";
			} while ($this->goede_antwoord >= $this->eind);
			// en de wisseltruuk
			$wissel = $this->getal1;
			$this->getal1 = $this->goede_antwoord;
			$this->goede_antwoord = $wissel;
			break;
		} # END SWITCH
	
		

	}

	function naar_session() {
		$_SESSION['goede_antwoord'] = $this->goede_antwoord;
		$_SESSION['getal1']=$this->getal1;
		$_SESSION['getal2']=$this->getal2;
		$_SESSION['bewerking']=$this->bewerking;
	}

	function willekeurige_getallen() {
		$this->getal1 = rand(1,$this->eind);
		$this->getal2 = rand(1,$this->eind);
	}
	
	function wissel_getallen() {
		if ($this->getal1 < $this->getal2) {
					$wissel = $this->getal1;
					$this->getal1 = $this->getal2;
					$this->getal2 = $wissel;
		}
	}
}



if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) 	{

	for ($j=1; $j<4; $j++) {
		

			print "Moeilijkheids graad: $j<br><hr>";
			for($i=1;$i<5;$i++) {
				$test = new Som($j);
				print "$test->getal1 $test->bewerking $test->getal2 = $test->goede_antwoord <br>";
			} 	
			print "<hr>";
	}
}
?>
