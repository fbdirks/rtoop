<?php

// rekentrainer.php
include "Training.php";
include "Som.php";

?>
<h2>Welkom bij deze rekentrainer</h2>


<?php

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
