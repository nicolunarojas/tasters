<?php
if(isset($_POST)){
	if($_POST["id_u"]<>""){

	include_once("database.php");	

	$id=$_POST["id_u"];
	$rutaImagen=$_POST["nombreImagen"];
	$descripcion=$_POST["descripcion"];

	$q='SELECT * FROM `registros` where `tipo`=2 ORDER BY RAND()';
	$usuario = mysqli_query($con, $q);
		$r =mysqli_fetch_array($usuario);
	$lugar=$r["id"];


$q='INSERT INTO `posts`(`id_usuario`, `contenido`, `imagen`, `fecha`, `likes`, `id_lugar`) VALUES ("'.$id.'","'.$descripcion.'","'.$rutaImagen.'","'.date('Y-m-d H:i:s').'",0,"'.$lugar.'")';
mysqli_query($con, $q);
echo $q."   ".$rutaImagen;

	}
}
?>