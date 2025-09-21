<!DOCTYPE html>
	<html>

		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Practicas</title>
			<link rel="stylesheet" type="text/css" href="style.css">

		</head>

		<body>

			<header>
				<h1> Mi Web en PHP </h1>
			</header> <br>

			<form method="POST" action="index.php">
				
				<div>
				
					<label> Nombre </label>
					<input type="name" name="user_name"/>

					<br>
					<br>

					<label> Contraseña </label>
					<input type="password" name="user_pass">

					<br>
					<br>

					<label> Email </label>
					<input type="email" name="user_email">

					<br>
					<br>

					<button type="submit">Enviar</button>

				</div>

			</form>

			<?php
				$info = !empty($_POST);

				if ($info == 1) {
					
					$name = $_POST['user_name'];
					$pass = $_POST['user_pass'];
					$email = $_POST['user_email'];

					echo("<br> <hr> <br> <h2>El Nombre de usuario es: " . $name . "<br> <br>  La contraseña es: " . $pass . "<br> <br> El Email del usuario es: " .$email . "</h1>");
				}

				elseif ($info == 0){
					echo("<h1>Ingrese la información</h1>");
				}
			?>
			<button onclick="location.href='main.php'">Clasificar</button>



		</body>

	</html>