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
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/main-publicacion.css">
	<link rel="stylesheet" type="text/css" href="css/estilos-publicacion.css">

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
	
	include("includes/database.php");
	$queryl = "SELECT registros.nombre, registros.imagenUsuario FROM registros WHERE registros.id = ".$_SESSION['id'];
	$usuario = mysqli_query($con, $queryl);
	$r =mysqli_fetch_array($usuario);


	echo "<div class='container'>";
	echo "<div class='imagenUsuario col-lg-2 col-md-2 col-sm-3 col-xs-3'>";
	echo "<figure>";
	echo "<img src='".$r['imagenUsuario']."' alt='user'/>";
	echo "</figure>";
	echo "</div>";

	echo "<div class='nombreUsuario col-lg-2 col-md-2 col-sm-3 col-xs-3'>";
	echo "<p>".$r['nombre']."</p>";
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
	



	include("includes/barranav.php");

	echo '<section>	<div class="containerDos">';

	include_once("includes/database.php");
	$query= "SELECT * FROM posts join registros on posts.id_usuario=registros.id WHERE posts.id_usuario=".$_SESSION['id'];
			// "SELECT * FROM posts join registros on  posts.id_usuario=registros.id";

	$resultado = mysqli_query($con,$query);

			// "SELECT * FROM posts join registros on  posts.id_usuario=registros.id WHERE post.id_usuario='".$id."'";
	if($resultado<>""){
		while ($row = mysqli_fetch_array($resultado)) {

			$idPost=$row['idp'];
			$foto=$row['imagenUsuario'];
			$nombre=$row['nombre'];

			$fecha = $row['fecha'];
			$fotoProducto=$row['imagen'];
			
			$queryl = "SELECT registros.nombre, registros.imagenUsuario FROM registros WHERE registros.id = ".$_SESSION['id'];
			$usuario = mysqli_query($con, $queryl);
			$r =mysqli_fetch_array($usuario);
			$lugar = $r["nombre"];
			
			$descripcion=$row['contenido'];
			$tastes =$row['likes'];				

			include("includes/producto.php");
		}
	}





	$id_usuario=$_SESSION['id'];

// $rutaImagen="img/posts/";

	include("includes/publicarproducto.php");
	


	?>



	

</div> <!-- /container -->
</section>

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


<script type="text/javascript">

	$(document).ready(function(){
		var elemArray = document.getElementsByClassName('btncomen');
		for(var i = 0; i < elemArray.length; i++){
			var elem = document.getElementById(elemArray[i].id);
			elem.addEventListener('click',publicarComentario,false);
		}
	});

	function publicarComentario(e){
		elemento= e.target;
		var id= elemento.getAttribute('indice');
		var iidd='comentar'+id;
		var texto=document.getElementById(iidd);
		var comentario= $('#comentar'+id).val();
	// $('#comentar'+id).val()="";
	$('#comentar'+id).attr('value',' ');
	var idUsu=texto.getAttribute('usuario');
	alert("Su comentario: \n"+'"'+comentario+'"\n fue guardado.');
	// alert(id+" "+idUsu+" "+comentario );

	$.ajax({
		type: "POST",
			// toca cambiar la url por la ubicació donde se encuentre el archivo php
			url: "includes/publicarComentario.php",
			data: { id_u: idUsu,  id_p: id, comentario: comentario}
		}).done(function(){
			console.log("Solicitud enviada al API");
		}).success(function(result){
			console.log("Resultado: "+result);
		}).error(function(error){
			console.log("Error: "+error);
		});


	}

</script>


</body>
</html>