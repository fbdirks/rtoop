<?php


function toon_lijst($lijst,$naam) {
	print "$naam:<br>";
	print "<pre>";
	print_r($lijst);
	print "</pre>";
	print "<hr>";
}

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