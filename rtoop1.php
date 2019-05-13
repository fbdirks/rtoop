<?php
include "kop.php";

?>
<h2>PO. Rekentrainer maken (praktische opdracht)</h2>
<p>Op deze pagina gaan we voor degenen die daar moeite mee hebben de rekentrainer opdracht (de tekst van de opdracht staat <a href="rtopdracht.php">hier</a>) stap voor stap ontwikkelen. Dat is meteen een voorbeeld in het klein van hoe je het bouwen van een applicatie aanpakt.</p> 
<p>
Een paar opmerkingen vooraf: als je zelf al begonnen bent en jouw uitwerking niet lijkt op de mijne, wees dan niet al te bezorgd. Programmeren kan op honderden manieren. Belangrijk is altijd: werkt jouw applicatie? Doet hij wat hij moet doen volgens de opdracht? Zo ja: heb dan vertrouwen in je eigen aanpak en werk daarmee verder.
</p>
<p>
De vorige les (9 mei) hebben we het gehad over de "Work Breakdown Structure", dat is een manier om (programmeer)werk aan een applicatie in brokjes op te delen. De kern van de aanpak kwam hier op neer:
<ul><li>Deel het werk op in steeds kleinere brokjes.</lie>
</ul>
Op het hoogste niveau is 'het werk' gelijk aan: 
<ul>
	<li>1. Maak een rekentrainer volgens de specificaties van de opdracht</li>
</ul>
Hoe deel je dit nu op in steeds kleinere brokjes?
</p>
<p>
	In de opdracht zelf wordt gesproken over het bouwen van drie pagina's:
	<ul>
		<li>1.1. Hoofdpagina van de Rekentrainer maken (rekentrainer.php)</li>
		<li>1.2. Object Training maken (Training.php)</li>
		<li>1.3. Object Som maken (Som.php)</li>
	</ul>
Ieder van deze drie pagina's heeft zijn eigen taken. <i>rekentrainer.php</i> is de pagina van de rekentrainer zelf, deze gebruikt de twee objecten Training en Som. Training zorgt voor het vragen en verwerken van de gewenste moeilijkheidsgraad, het tonen en controleren van de opgaven en het aan het eind tonen van de resultaten van een training.
</p>
<p>Als we verder kijken naar bijvoorbeeld het object <i>Training</i> dan zien we dat we ook dit object weer kunnen opdelen in een aantal onderdelen:
	<ul>
		<li>1.2.1 <em>moeilijkheid_vragen</em>: Als de rekentrainer gestart wordt moet gevraagd worden naar de gewenste moeilijkheidsgraad (1, 2 of 3)</li>
		<li>1.2.2 <em>moeilijkheid_opslaan</em>: Als de moeilijkheidsgraad is ingegeven moet deze opgeslagen worden (in $_SESSION ligt voor de hand) en moet een eerste som getoond worden waarop de gebruiker een antwoord kan ingeven.</li>
		<li>1.2.3 <em>som_tonen</em>:Dit antwoord moet gecontroleerd worden en zolang de 10 sommen nog niet klaar zijn moet een volgende som getoond worden</li>
		<li>1.2.4 <em>resultaat_tonen</em>: Als de 10e som gemaakt is moet het resultaat van de training getoond worden.</li>
	</ul>
	</p> 

<p>Je ziet hoe we, nog zonder een regel code geschreven te hebben, het werk al aan het opdelen zijn. Als we de WBS structuur samenvatten zien we dit:
	<ul>
		<li>1 Rekentrainer maken</li>
		<ul>
			<li>rekentrainer.php: de hoofdpagina</li>
			<li>Training.php: het object Training</li>
			<ul>
				<li>moeilijkheid_opvragen()</li>
				<li>moeilijkheid_opslaan()</li>
				<li>som_tonen() en som_controleren()</li>
				<li>resultaat_tonen()</li>
			</ul>
			<li>Som.php: het object Som</li>
		</ul>
	</ul>
	
	Hieronder zie je de (mogelijke) code van rekentrainer.php en Training.php:
	
	
	</p>



<pre><code class="language-php">
&lt;?php
// rekentrainer.php

include "Training.php";
include "Som.php";

session_start();


print"<h2>Welkom bij deze rekentrainer</h2>";




$Beurt = new Training();

if (!isset($_POST['actie'])) {
			$Beurt->moeilijkheid_vragen();
} else if($_POST['actie']=="Moeilijkheid Opgeven") {
			$Beurt->moeilijkheid_opslaan();
} else if ($_POST['actie']=="Antwoord Geven") {
	if ($_SESSION['som'] < 10) {
		$Beurt->som_opgeven();
	} else {
		$Beurt->resultaat_tonen();
	}
}





?>
</code></pre>

<pre><code class="language-php">
&lt;?php
/* de code van het object Training
Taken:
1. Moeilijkheidsgraad vragen en administreren
2. 10 sommen presenteren
3. Na de 10e som het resultaat laten zien 
4. De mogelijkheid geven om de training te herhalen
*/

class Training {
	private $moeilijkheidsgraad = 1; #moeilijkheidsgraad, default is 1.
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

</code></pre>
<p>De opdracht is nu het volgende:

<ol>
	<li>Denk na over de taken die rekentrainer.php moet uitvoeren. Welke zijn dat? Maak daar een WBS van. Als je goed naar de code hierboven kijkt zie je die taken eigenlijk al staan. Ze zijn al voor je geprogrammeerd. Probeer ze alleen te benoemen.</li>
	<li>Denk na over de taken die Som.php moet uitvoeren. Welke zijn dat? Maak ook daar een WBS van.</li>
	<li>Schrijf de code die gaat vragen om de moeilijkheidsgraad. Zorg ervoor dat die code alleen gestart wordt als er nog geen som is gemaakt.</li>
	<li>Zorg ervoor dat als een moeilijkheidsgraad gekozen is deze in $_SESSION['moeilijkheidsgraad']  wordt opgeslagen.</li>
</ol>	
	
	
</p>



<?php
include "voet.php";
?>