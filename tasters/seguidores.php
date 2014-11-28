<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Tasters</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/bootstrap.min.css">

	<link rel="stylesheet" href="css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Dosis:400,200,300,500,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="favicon.ico" />

	<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>

	<div class="container-full">
		<img src="img/fondos/img1.jpg" alt="comida1"/>
	</div>

	<div class="container">
		<div class="info col-lg-2 col-md-2 col-sm-2 col-xs-2">
			<img src="img/tasterHeader.png" alt="taster"/>
		</div>
		<div class="infoNivel col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<img src="img/nivel.png" alt="taster"/>
		</div>
	</div>

	<?php
	session_start();
		include_once("includes/database.php");

		$r = array();

		if(empty($_GET)){	
			$query = "SELECT registros.nombre, registros.imagenUsuario FROM registros
								WHERE registros.id = '".$_SESSION['id'] ."'";
			$usuario = mysqli_query($con, $query);
		} else {
			$queryl = "SELECT registros.nombre, registros.imagenUsuario FROM registros
								WHERE registros.id = ".$_GET['id'];
			$usuario = mysqli_query($con, $queryl);

		}

		$i = 0;
		while ($row = mysqli_fetch_array($usuario)) {
			$r[] = $row;
			echo "<div class='container'>";
				echo "<div class='imagenUsuario col-lg-2 col-md-2 col-sm-3 col-xs-3'>";
					echo "<figure>";
						echo "<img src='".$r[$i]['imagenUsuario']."' alt='user'/>";
					echo "</figure>";
				echo "</div>";

				echo "<div class='nombreUsuario col-lg-2 col-md-2 col-sm-3 col-xs-3'>";
					echo "<p>".$r[$i]['nombre']."</p>";
					echo "<a href=''>";
						echo "<div class='seguir col-lg-8 col-md-10 col-sm-8 col-xs-8'>";
							echo "<p>";
								echo "Seguir";
							echo "</p>";
							echo "<img src='img/T-seguir.png' alt='T' width='15' />";				
						echo "</div>";
					echo "</a>";
				echo "</div>";

				echo "<div class='lugarFavorito col-lg-2 col-md-8 col-sm-6 col-xs-6'>";
					echo "<p>";
						echo "EL PEÑÓN";
					echo "</p>";
					echo "<p id='lugar'>";
						echo "LUGAR FAVORITO";
					echo "</p>";
				echo "</div>";
			echo "</div>";
		};
	
		include("includes/barranav.php");

	echo "<section>";
		include_once("includes/database.php");

		$r = array();

		if(empty($_GET)){	
			$querySeguidores = "SELECT registros.nombre, registros.imagenUsuario FROM registros
								JOIN seguidores ON seguidores.id_seguidor = registros.id
								WHERE seguidores.id_usuario = '".$_SESSION['id'] ."'";
			$seguidores = mysqli_query($con, $querySeguidores);
		} else {
			$querySeguidoresUrl = "SELECT registros.nombre, registros.imagenUsuario FROM registros
								JOIN seguidores ON seguidores.id_seguidor = registros.id
								WHERE seguidores.id_usuario = ".$_GET['id'];
			$seguidores = mysqli_query($con, $querySeguidoresUrl);

		}

		$i = 0;
		while ($row = mysqli_fetch_array($seguidores)) {
			$r[] = $row;

			echo "<div class='containerDos'>";
				echo "<article class = 'articulo col-lg-5 col-md-5 col-sm-5 col-xs-5'>";
					echo "<figure class='col-lg-4 col-md-6 col-sm-5 col-xs-5'>";
						echo "<img src='".$r[$i]['imagenUsuario']."' alt='msn'/>";
					echo "</figure>";

					echo "<h4>".$r[$i]['nombre']."</h4>";
					echo "<a href=''>";
						echo "<div class='seguirUsuario col-lg-4 col-md-6 col-sm-4 col-xs-5'>";
							echo "<p>";
								echo "Seguir";
							echo "</p>";
							echo "<img src='img/T-seguir.png' alt='T' width='15' />";
						echo "</div>";
					echo "</a>";
				echo "</article>";
			echo "</div>"; /*<!-- /container -->*/

			$i++;
		};
	echo "</section>";
	?>

	<div class="container">
		<div class="footer col-lg-3 col-md-4 col-sm-6 col-xs-6">
			<hr noshade>
			<footer>
				<p>
					<a href="#">Acerca de</a> |
					<a href="#">Términos y Condiciones</a> |
					<a href="#">Contacto</a>
				</p>
				<p>&copy; 2014</p>
				<div class="footerDos col-lg-4 col-md-5 col-sm-4 col-xs-4">
					<footer>
						<img src="img/tasterFooter.png" alt="taster"/>
					</footer>
				</div>
			</footer>
		</div>
		<div class="footerTres col-lg-4 col-md-2 col-sm-2 col-xs-2"
			<footer>
				<img src="img/tasterFooter.png" alt="taster"/>
			</footer>
		</div>
	</div>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

	<script src="js/vendor/bootstrap.min.js"></script>

	<script src="js/main.js"></script>
</body>
</html>