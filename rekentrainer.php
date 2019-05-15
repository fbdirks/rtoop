<?php
// rekentrainer.php

include "functies.php";
include "Training.php";
include "Som.php";

session_start();

//toon_lijst($_SESSION,"Session");
//toon_lijst($_POST,"Post");
kop();
?>
<div id="content">
<h2>Welkom bij deze rekentrainer</h2>


	

<?php

$Beurt = new Training();

if (!isset($_POST['actie'])) {
			$Beurt->moeilijkheid_vragen();
} else if($_POST['actie']=="Moeilijkheid Opgeven") {
			$Beurt->moeilijkheid_opslaan();
} else if ($_POST['actie']=="Antwoord Geven") {
		$Beurt->som_opgeven();

}

?>
</div>
<?php

voet();

?>



