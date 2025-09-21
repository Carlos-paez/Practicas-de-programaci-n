<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>clasificación</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<header>
				<h1> Mi Web en PHP </h1>
			</header> <br>
	
	<form method="POST" action="main.php">
		
		<label><h1>¿Como clasifica el servicio del 1 al 10?</h1></label>
		<br>
		<br>
		<input type="range" min="1" max="10" name="user_top">

		<button type="submit">Clasificar</button>

	</form>

	<?php
		$top = !empty($_POST['user_top']);

		if ($top == 1) {
			$clasificacion = $_POST['user_top'];

			switch ($clasificacion) {
				case 1:
				case 2:
				case 3:
					echo("<h1>Su clasificación es: " . $clasificacion . " - Muy malo</h1>");
					break;
				case 4:
				case 5:
				case 6:
					echo("<h1>Su clasificación es: " . $clasificacion . " - Regular</h1>");
					break;
				case 7:
				case 8:
					echo("<h1>Su clasificación es: " . $clasificacion . " - Bueno</h1>");
					break;
				case 9:
				case 10:
					echo("<h1>Su clasificación es: " . $clasificacion . " - Excelente</h1>");
					break;
			}
		}
	?>

</body>
</html>