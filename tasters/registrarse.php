<html>
<head>
	<title>Tasters</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="favicon.ico" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<!-- Konami Code -->
	<script src="js/konami.js"></script>
</head>

<body class="registro">
<iframe id="easter" width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe>
	<!-- <img id="youarewinner" src="http://i39.photobucket.com/albums/e155/bobdebeelder/winner_2.png"> -->
	<div class="outerInicioSesion">
		<div class="middleInicioSesion">
			<div class="innerInicioSesion">
				<figure>
					<img src='images/logo.png'/>
				</figure>
				<br />
				<div id="slogan">
				<p>Escoge el tipo de usuario</p>
				</div>
				<br />

				<form action="registrarse.php" method="POST">

					

					<div class="botonTipo tipoActivo" id="persona">PERSONA</div>
					<div class="botonTipo" id="restaurante">RESTAURANTE</div>

					<br/>
					<br/>

					<input class="inicioSesion" id="nombreEmpresa" type="text" name="nombre" placeholder="Nombre completo"><br>
					<input class="inicioSesion" type="email" name="email" placeholder="Email"><br>
					<input class="inicioSesion" type="password" name="pass" placeholder="Contraseña"><br>
					<input id="tipoUser" type="hidden" name="tipo" value="1">
					<input class="geolocalizacion" type="text" name="geolocation" placeholder="Clic para compartir ubicación"><br>
					<input id="imagenUser" type="hidden" name="imagen" value="profile_default.jpg">

					<input id="botonIniciar" name="registro" type="submit" value="Registrarse">	
				</form>
				<form action="index.php">
					<input id="botonRegistrar" name="registro" type="submit" value="Iniciar sesión">	
				</form>
				<br />

				<div id="separador">
					<p>ó</p>
				</div>
				<br />
				<div id="conectateRedes">
					<p>Conéctate con</p>
					<br />
					<div id="redes">
						<a id="fb" href="#"></a>
						<a id="tw" href="#"></a>
						<a id="goog" href="#"></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="avisoInicioSesion">
		<?php
		session_start();
		if($_POST!=null){

			$nombreCompleto = $_POST["nombre"];
			$_SESSION['user'] = $_POST["email"];
			$tipo = $_POST["tipo"];
			$password = $_POST["pass"];
			$ubicacion = $_POST["geolocation"];
			$imagen = $_POST["imagen"];


			include_once("includes/database.php");

			if (isset($_POST['registro'])) {
       			//Pregunta si el usuario existe antes de registrarlo
				$resultConsulta = mysqli_query($con,"SELECT correo FROM registros WHERE registros.correo = '" .$_SESSION['user']."'");

				if(mysqli_num_rows($resultConsulta) == 0) {

					if ($tipo == 1){

						if(!($_SESSION['user'] && $password && $nombreCompleto)){
							echo "<br />";
							echo "<p>Dejaste algún campo en blanco</p>";
							echo "<br />";
						}else{
							//Inserta un nuevo usuario y contraseña en la tabla de usuarios
							$result = mysqli_query($con,"INSERT INTO registros (`nombre`, `correo`, `tipo`, `contrasena`, `imagenUsuario`) VALUES ('".$nombreCompleto."','".$_SESSION['user']."','".$tipo."','".$password."','".$imagen."')");
							echo "<br />";
							echo "<p>Registro exitoso. Inicia sesión.</p>";
							echo "<br />";
						}

					}

					if ($tipo == 2){

						if(!($_SESSION['user'] && $password && $nombreCompleto && $ubicacion)){
							echo "<br />";
							echo "<p>Dejaste algún campo en blanco</p>";
							echo "<br />";
						}else{
							//Inserta un nuevo usuario y contraseña en la tabla de usuarios
							$result = mysqli_query($con,"INSERT INTO registros (`nombre`, `correo`, `tipo`, `contrasena`, `ubicacion`, `imagenUsuario`) VALUES ('".$nombreCompleto."','".$_SESSION['user']."','".$tipo."','".$password."','".$ubicacion."','".$imagen."')");
							echo "<br />";
							echo "<p>Registro exitoso. Inicia sesión.</p>";
							echo "<br />";
						}

					}


				} else {
					echo "<br />";
					echo "<p>Usuario ya existe</p>";
					echo "<br />";
				}

				mysqli_close($con);
			}

		}

		?>
	</div>


	<script type="text/javascript">
		$(function() {
		    $('#persona').click(function() {
		    	$('#tipoUser').attr("value", "1");
		    	$('#imagenUser').attr("value", "profile_default.jpg");
		    	$('#nombreEmpresa').attr("placeholder", "Nombre completo");
				$('#persona').addClass('tipoActivo');
				$('#restaurante').removeClass('tipoActivo');
				$(".geolocalizacion").css('display', 'none');
				$(".geolocalizacion").removeClass('geoEstilo');
		    });

		    $('#restaurante').click(function() {
		    	$('#tipoUser').attr("value", "2");
		    	$('#imagenUser').attr("value", "restaurant_default.jpg");
		    	$('#nombreEmpresa').attr("placeholder", "Nombre restaurante");
				$('#restaurante').addClass('tipoActivo');
				$('#persona').removeClass('tipoActivo');
				$(".geolocalizacion").css('display', 'inline');
				$(".geolocalizacion").addClass('geoEstilo');
		    });
		 });
	 </script>

	 <script type="text/javascript">
	 var x = document.getElementById("demo");


	 	$('.geolocalizacion').one('click', function(e) {

		    if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(showPosition);		        
		    } else {
		        x.innerHTML = "La geolocalización no es soportada por este navegador";
		    }
		});

		function showPosition(position) {
			$('.geolocalizacion').val(position.coords.latitude +
		    ", " + position.coords.longitude);
		}
	 </script>

	<!-- Konami Code -->
	<script>
		$("#easter").css("display", "none");
		$("#easter").css("position", "absolute");
		$("#easter").css("z-index", "-9999");

		$("#youarewinner").css("display", "none");
		$("#youarewinner").css("position", "absolute");
		$("#youarewinner").css("width", "221px");
		$("#youarewinner").css("margin-left", "calc(50% - 110px)");
		$("#youarewinner").css("top", "calc(50% - 118px)");
		$("#youarewinner").css("z-index", "-9999");

	    var easter_egg = new Konami();
	    easter_egg.code = function() {  
		   var script = document.createElement("script");
		   script.src="js/gravityscript-autorun.js";
		   document.body.appendChild(script);
		   void(0); 
		   $("#easter").css("display", "inline");
		   $("#youarewinner").css("display", "inline");
		   document.getElementById("easter").setAttribute("src", "//www.youtube.com/embed/Ktbhw0v186Q?autoplay=1&controls=0&showinfo=0&iv_load_policy=3&modestbranding=0");
	    }
	    easter_egg.load();

	</script>

</body>
</html>