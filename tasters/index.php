<html>
<head>
	<title>Tasters</title>
	<meta charset="utf-8">

<!-- 	<link rel="stylesheet" type="text/css" href="css/main-publicacion.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/estilos-publicacion.css"> -->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	

	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="favicon.ico" />
</head>

<body class="inicio">
	<div class="outerInicioSesion">
		<div class="middleInicioSesion">
			<div class="innerInicioSesion">
				<figure>
					<img src='images/logo.png'/>
				</figure>
				<br />
				<div id="slogan">
				<p>La comunidad más grande de degustadores en el mundo</p>
				</div>
				<br />

				<form action="index.php" method="POST">
					<input class="inicioSesion" type="text" name="user" placeholder="Correo electrónico"><br>
					<input class="inicioSesion" type="password" name="pass" placeholder="Contraseña"><br>
					<input id="botonIniciar" name="inicio" type="submit" value="Iniciar sesión">	
				</form>
				<form action="registrarse.php">
					<input id="botonRegistrar" name="registro" type="submit" value="Registrarse">	
				</form>
			</div>
		</div>
	</div>


	<div id="avisoInicioSesion">
		<?php
		session_start();
		if($_POST!=null){

			$_SESSION['user'] = $_POST["user"];
			$password = $_POST["pass"];

			include_once("includes/database.php");


			//Revisa si el usuario y contraseña coinciden con la base de datos
			if (isset($_POST['inicio'])) {
				$result = mysqli_query($con,"SELECT correo, contrasena,id FROM registros WHERE registros.correo ='" .$_SESSION['user']."'" . " AND registros.contrasena ='" .$password."'");

				if(mysqli_num_rows($result) == 0) {

					if(!($_POST["user"] && $password)){
						echo "<br />";
						echo "<p>Dejaste algún campo en blanco</p>";
						echo "<br />";
					}else{
						echo "<br />";
						echo "<p>Usuario o contraseña incorrectos</p>";
						echo "<br />";
					}
				} else {
					$_SESSION['id'] = mysqli_fetch_array($result)["id"];

					header("Location: home.php");
					die();
				}

				mysqli_close($con);
			}		

		}

		?>
	</div>

</body>
</html>