<?php

/* de code van het object Training

Taken:
1. Moeilijkheidsgraad vragen en administreren
2. 10 sommen presenteren
3. Na de 10e som het resultaat laten zien 
4. De mogelijkheid geven om de training te herhalen

*/

class Training {
	private $aantal = 10; # aantal beurten. Nu hardcoded.
	private $som = 0; # volgnummer van de som die aan de beurt is. Start op 0.
	private $goed = 0; # aantal goed beantwoorde vragen
	private $vragen = "Dit zijn de opdrachten die je gemaakt hebt:<br>"; # extratje: de tekst van alle vragen en antwoorden

	
	function __construct() {
		// Wat er moet gebeuren bij het maken van het trainingobject		
	}

	function moeilijkheid_vragen() {
		// Opvraagformulier voor moeilijkheid
	}	

	function moeilijkheid_opslaan() {
		// Verwerken keuze moeilijkheid en starten training
	}


	function som_opgeven() {
		// Verwerken antwoord (als er al een antwoord is) en tonen van nieuwe som 

	}


	function resultaat_tonen() {
		// Laten zien van het resultaat
	}
}


?>
