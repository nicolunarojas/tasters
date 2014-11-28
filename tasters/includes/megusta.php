<?php

session_start();

include_once("database.php");

# Tomamos el id de nuestro posts y vemos todas las ip que pusieron likes
$id = (int) $_GET['idp'];
$query = mysqli_query($con, "SELECT idp,id_usuario FROM posts WHERE idp='".$id."'");
$row = mysqli_fetch_assoc($query);
$user_id = $row['id_usuario'];
$id_us = $_SESSION['id'];

$q='SELECT * FROM `likes` WHERE `idp`='.$id.' AND `idu`='.$id_us;
$rr=mysqli_query($con,$q );
//echo $result;

$result= mysqli_fetch_array($rr);


if($result["idp"]==$id){
?>
	    <form name="formulario" method="post" action="../home.php">
	        <input type="hidden" name="msg_error" value="1">
	    </form>
	<?php

}else{

	$q="INSERT INTO likes (idp, idu) VALUES (".$id.",".$id_us.")";
	mysqli_query($con,$q);
	$q="UPDATE posts SET likes=likes+1 WHERE idp='".$id."'";
	mysqli_query($con, $q);
	header('location:../home.php');

}

?>

<script type="text/javascript"> 
	//Envia los datos de los mensajes de error a nuestra pagina de inicio de sesion
	document.formulario.submit();
</script>