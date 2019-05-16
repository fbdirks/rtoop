<?php
// rekentrainer.php

include "functies.php";  # bedoeld voor pagina en debugfuncties (indien nodig)
include "Training.php";  # bedoeld voor het organiseren van een trainingssessie
include "Som.php";  # bedoeld voor het opzetten van een rekenopgave

session_start();  # omdat we het geheugen nodig hebben

//toon_lijst($_SESSION,"Session");  # nuttig tijdens debuggen
//toon_lijst($_POST,"Post");  # nuttig tijdens debuggen

// ---- Hier start het werk -----

kop();
?>
<div id="content">
<h2>Welkom bij deze rekentrainer</h2>


<?php

$Beurt = new Training();  // het object

//drie methoden van het object

if (!isset($_POST['actie'])) {
			$Beurt->moeilijkheid_vragen();
} else if($_POST['actie']=="Moeilijkheid Opgeven") {
			$Beurt->moeilijkheid_opslaan();
} else if ($_POST['actie']=="Antwoord Geven") {
		$Beurt->som_opgeven();
		// Verwerken van antwoord en eindresultaat zitten hier in
}

?>
</div> <!-- einde content-id -->
<?php

voet();

?>



