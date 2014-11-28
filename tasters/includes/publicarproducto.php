<!-- 

			$foto="images/user1.jpg";
			$nombre="ALEJANDRO SANCLEMENTE";
			$fecha = "2014-10-19";
			$fotoProducto="images/background.jpg";
			$lugar = "SALERNO";
			$descripcion="Excelente el servicio, me encantó la comida. Se puede volver.";
			$tastes =2;



			id_usuario
			contenido
			rutaImgen



$id_usuario
$rutaimagen

-->



<?php

// $info=$id_usuario."-".$rutaImagen;
$info=$id_usuario;
echo '
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 producto">
	<div class="container-fluid tituloProducto">	
		<div class="row>		
			<div class="foto">
				<figure>
					
					';

				include("/includes/cima/cargaImagen.php");

					echo'
				</figure>
			</div>
		</div>
		<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
					<input id="descripcion" type="text" name="descripcion" placeholder="Escribir descripción"/>
				</div>
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
					<input id="botonPublicar" name="botonPublicar" type="submit" value="publicar"/> 
				</div>

		</div>
	</div>
</div>
';
?>




