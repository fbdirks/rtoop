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
	private $getal1; # getal 1 van een som
	private $getal2; # getal 2 van een som
	private $bewerking; # de bewerking van de som (bijvoorbeeld + )
	private $goede_antwoord; # het goede antwoord van de som
	private $vragen = "Dit zijn de opdrachten die je gemaakt hebt:<br>"; # extratje: de tekst van alle vragen en antwoorden

	
	function __construct() {
		// Wat er moet gebeuren bij het maken van het trainingobject		
	}

	function moeilijkheid_vragen() {
		// Opvraagformulier voor moeilijkheid
		?>
		<form action="rekentrainer.php" method="post">
			<h2>Moeilijkheidsgraad opgeven:</h2>
			<input type="radio" name="soort" value="1" checked> 1 <br>
			<input type="radio" name="soort" value="2"> 2 <br>
			<input type="radio" name="soort" value="3"> 3 <br>
			<input type="submit" name="actie" value="Moeilijkheid Opgeven">
		</form>
		<?php
	}	

	function moeilijkheid_opslaan() {
		// Verwerken keuze moeilijkheid en starten training
		$_SESSION['moeilijkheidsgraad'] = $_POST['soort'];
		print "U hebt gekozen voor moeilijkheidsgraad $_POST[soort].<br>";
		$_SESSION['som']=0; # de som aan de beurt is 0.
		$_SESSION['goed']=0; # er zijn nog 0 sommen goed aan het begin.
		$this->som_opgeven(); # overschakelen naar het laten zien van een som.

	}


	function som_opgeven() {
		// Verwerken antwoord (als er al een antwoord is) en tonen van nieuwe som 
		if ($_SESSION['som'] < 10) {
			// EERST CONTROLEREN
			if ($_SESSION['som']>0) {
				$gegeven_antwoord = $_POST['antwoord'];
				if ($gegeven_antwoord == $_SESSION['antwoord']) {
					$_SESSION['goed']++; # bij de goede antwoorden komt er 1 bij.
				}
				$_SESSION['antwoorden'] = $_SESSION['antwoorden'] + "$_SESSION[getal1] $_SESSION[bewerking] $_SESSION[getal2] = $_SESSION[goede_antwoord] (jouw antwoord: $_POST[antwoord])";
			}

			// DAN DE NIEUWE tonen
			$s = new Som($_SESSION['moeilijkheidsgraad']);
			$_SESSION['som']++; # het nummer van de som ophogen.
			$_SESSION['getal1'] = $s->getal1;
			$_SESSION['getal2'] = $s->getal2;
			$_SESSION['bewerking'] = $s->bewerking;
			$_SESSION['goede_antwoord'] = $s->goede_antwoord;
			print "<form action='rekentrainer.php' method='post'>";
			print "Reken uit:  $s->getal1 $s->bewerking $s->getal2 = ";
			print "<input type='text' name='antwoord'>";
			print "<input type='submit' name='actie' value='Antwoord Geven'>";
			print "</form>";
		} else {
			$this->resultaat_tonen();
		}
	}


	function resultaat_tonen() {
		// Laten zien van het resultaat
	}
}


?>
