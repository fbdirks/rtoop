<?php
include "kop.php";

?>
<h2>Rekentrainer maken (praktische opdracht)</h2>
<p>Casus: je bouwt een rekentrainer voor de basisschool. Dat is een applicatie waarmee
basisschoolleerlingen hun rekenvaardigheden kunnen trainen. Om de complexiteit niet te groot te
maken zien we af van een inlogsysteem en van een vorderingenmodule. Wie de basisopdracht te
makkelijk vindt mag die gerust gaan inbouwen. Als een leerling de pagina oproept moet de pagina
vragen om een moeilijkheidsgraad. Het verschil tussen de moeilijkheidsgraden is:
</p>
<ol>
	<li>Alleen + en - sommen, geen negatieve getallen, uitkomsten altijd tussen 1 en 20</li>
<li>Alleen +, - en * sommen, geen negatieve getallen, uitkomsten altijd tussen 1 en 50</li>
<li>+ - * en / , geen negatieve getallen, uitkomsten altijd tussen 1 en 100, geen decimalen bij
deelsommen</li>
</ol>
<p>
Vervolgens krijgt de leerling 10 opdrachten voorgeschoteld binnen de gekozen moeilijkheidsgraad.
De antwoorden die de leerling geeft worden gecontrolleerd en er wordt bijgehouden hoeveel goede
antwoorden de leerling heeft gegeven (tip: gebruik $_SESSION). Na 10 vragen wordt verteld hoe
goed de leerling het heeft gedaan. De afsluitende pagina hoeft niet de sommen te laten zien die goed
of fout waren. Ook hier weer de uitdaging voor wie de opdracht te makkelijk vindt: zorg ervoor dat
de afsluitende pagina laat zien welke sommen niet goed waren. Bijvoorbeeld zo:
<pre>2 + 3 = 6 (jouw antwoord), moet zijn: 2+3 = 5</pre>
</p>
<p>
Je moet in je uitwerking gebruik maken van ten minste twee objecten:
<ol>
	<li>Training: deze verzorgt de interface, de keuze van de moeilijkheidsgraad, het laten zien van
de achtereenvolgende sommen en het laten zien van het resultaat van de training</li>
	<li>Som: deze verzorgt het uitzoeken van de willekeurige getallen, bewerkingen en uitkomsten
die bij de beurten in een training horen.</li>
</ol>

Het advies is daarbij gebruik te maken van een 'hoofdpagina' (bijvoorbeeld rekentrainer.php) die de twee objecten aan elkaar verknoopt. Je zult merken dat deze pagina behoorlijk leeg kan blijven.

</p>
<p>
	Dit is een voorbeeld van een (stukje) klassendiagram voor Som.php:
	<table border="1">
		<tr>
			<td>Attributen:</td>
			<td>moeilijkheidsgraad</td>
		</tr>
		<tr>
			<td>Methoden:</td>
			<td>som_maken()  (input: moeilijkheidsgraad, output: getal1, getal2, bewerking, goede_antwoord)</td>
		</tr>
	</table>
</p>
</p> 




<?php
include "voet.php";
?>