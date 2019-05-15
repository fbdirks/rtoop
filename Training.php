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
		$_SESSION['goede_antwoord']=1;
		$_SESSION['antwoord']=1;
		$_SESSION['antwoorden']= "De opdrachten en gegeven antwoorden:<br>";		
		$this->som_opgeven(); # overschakelen naar het laten zien van een som.

	}


	function som_opgeven() {
		// Verwerken antwoord (als er al een antwoord is) en tonen van nieuwe som 
		
			if ($_SESSION['som'] < 10) {
				// EERST CONTROLEREN, alleen als nummer van de som groter is dan 0.
				if ($_SESSION['som']>0) {
					$gegeven_antwoord = $_POST['antwoord'];
					if ($gegeven_antwoord == $_SESSION['goede_antwoord']) {
						$_SESSION['goed']++; # bij de goede antwoorden komt er 1 bij.
						$kleur = "green";
					} else {
						$kleur = "red";
					}
					$_SESSION['antwoorden'] = $_SESSION['antwoorden'] . "$_SESSION[getal1] $_SESSION[bewerking] $_SESSION[getal2] = $_SESSION[goede_antwoord] (jij: <span style='color: $kleur;'>$_POST[antwoord] </span>)<br>";
				}
			
		
			// DAN DE NIEUWE tonen
			$s = new Som($_SESSION['moeilijkheidsgraad']);
			$_SESSION['som']++; # het nummer van de som ophogen.
			$s->naar_session();
			print "<form action='rekentrainer.php' method='post'>";
			print "Reken uit:  $s->getal1 $s->bewerking $s->getal2 = ";
			print "<input type='text' name='antwoord'>";
			print "<input type='submit' name='actie' value='Antwoord Geven'>";
			print "</form>";
		} else {
			// het laatste antwoord moet ook nog gecontroleerd worden!
			$gegeven_antwoord = $_POST['antwoord'];
			if ($gegeven_antwoord == $_SESSION['goede_antwoord']) {
				$_SESSION['goed']++; # bij de goede antwoorden komt er 1 bij.
				$kleur = "green";
			} else {
				$kleur = "red";
			}
			$_SESSION['antwoorden'] = $_SESSION['antwoorden'] . "$_SESSION[getal1] $_SESSION[bewerking] $_SESSION[getal2] = $_SESSION[goede_antwoord] (jij: <spann style='color: $kleur;'>$_POST[antwoord] </span>)<br>";
			
			$this->resultaat_tonen();
		}
	}


	function resultaat_tonen() {
		print "Dit zijn de resultaten van je training:<br><hr>";
		print "Aantal gestelde vragen:  {$_SESSION['som']} <br>";
		print "Aantal vragen goed: {$_SESSION['goed']}<br>";
		print "{$_SESSION['antwoorden']}";
		print "<br><a href='rekentrainer.php'>Opnieuw proberen</a>";
		
		
	}
	
	
	function geheugen_wissen() {
		session_unset();
		session_destroy();
	}
}


?>
