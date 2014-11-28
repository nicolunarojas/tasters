<?php
if(isset($_POST)){
	if($_POST["id_u"]<>""){

	include_once("database.php");	

	$idu=$_POST["id_u"];
	$idp=$_POST["id_p"];
	$comen=$_POST["comentario"];


$q='INSERT INTO `comentarios_posts`(`id_usuario`, `id_post`, `comentario`, `likes`) VALUES ('.$idu.','.$idp.',"'.$comen.'",0)';
mysqli_query($con, $q);
	}
}
?>