<!-- 
$foto   "images/nombreDeLaImagen.jpg"
$nombre  nombre del que hace la publicación
$fecha   fecha de la publicacion
$id;
-->

<?php
// $idPost="row";
echo '
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 producto">
	<div class="container-fluid tituloProducto">	
		<div class="row-fluid">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4" >	
				<div class="foto">
					<figure>
						<img src="'.$foto.'"/>
					</figure>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-7 col-xs-7">	
				<h3>'.$nombre.'</h3>
				<h4>'.$fecha.'</h4>
			</div>
		</div>

	</div>
	<div class="foto">
		<figure>
			<img src="'.$fotoProducto.'"/>
		</figure>
	</div>

	<div class="row-fluid tituloProducto">
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" >	
			<figure>
				<img src="images/lugar.png"/>
			</figure>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >	
			<h4>'.$lugar.'</h4>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row-fluid">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >	
				<p>
					'.$descripcion.'
				</p>
			</div>
		</div>
	</div>

	<div class="row-fluid ">
		<div class="container-fluid tastes tituloProducto">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" >	
				<figure>
					<a href="includes/megusta.php?idp='.$idPost.'"><img src="favicon.png"/></a>
				</figure>
			</div>
			<div class="col-lg-3 co3-md-3 col-sm-3 col-xs-3" >	
				<h4>'.$tastes.' Tastes</h4>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="row-fluid">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" >	
				<figure>
					<img src="'.$foto.'"/>
				</figure>
			</div>
			<div>
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" >		
					<input usuario="'.$_SESSION['id'] .'" id="comentar'.$idPost.'" type="text" name="comentar" placeholder="Escribir comentario"/>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >	
					<input indice="'.$idPost.'" id="botonComentar'.$idPost.'" class="btncomen" name="botonComentar" type="submit" value="comentar"/> 
				</div>
			</div>
		</div>
	</div>';



			include_once("includes/database.php");
			$query= "SELECT * FROM comentarios_posts join registros on comentarios_posts.id_usuario=registros.id WHERE comentarios_posts.id_post=".$idPost;
			// "SELECT * FROM posts join registros on  posts.id_usuario=registros.id";

			$resultado = mysqli_query($con,$query);
if($resultado<>""){
while ($row = mysqli_fetch_array($resultado)) {
$comen=$row["comentario"];
$likes=$row["likes"];
$nombre=$row["nombre"];
$imagen=$row["imagenUsuario"];


echo '
<div class="">
<div class="row-fluid comentarioo ">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" >	
				<figure>
					<img src="'.$imagen.'"/>
				</figure>
				'.$nombre.'
			</div>


			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" >	
				
				'.$comen.'
			</div>

			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" >	
				
				likes: '.$likes.'
			</div>
</div> </div>

			';



}
}

echo '</div>';

?>




