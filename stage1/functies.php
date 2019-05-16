<?php


function toon_lijst($lijst,$naam="lijst") {
	print "$naam:<br>";
	print "<pre>";
	print_r($lijst);
	print "</pre>";
	print "<hr>";
}

// De volgende twee functies staan vaak in een apart functiebestand.
// Als jouw applicatie echt maar uit een pagina bevat mag deze code ook gerust op de pagina zelf staan.
// Als jouw applicatie meer pagina's bevat is het altijd beter de onderstaande werkwijze te kiezen.


function kop() {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="rekentrainer.css">
	</head>	
	<body>
		<?php
}


function voet() {
	?>
	</body>
	</html>
	<?php
}

?>