<!-- 
$siguiendo  "siguiendo" / "seguir" 
$nombreU  nombre del usuario
$nombreP del perfil que va a visitar
$direccion  -> "includes/seguir.php?nomP=".$nombreP." & nomU=".$nombreU." & sig=".$siguiendo;
-->
<?php
// inicializar la dirección
$direccion="#";
$fondo="#FF6D00";
if($siguiendo=="seguir"){
	$fondo="#4C4C4C";
}

echo '

<a href="'.$direccion.'" class="Bseguir"><div  class="botonseguir '.$siguiendo.'" > 
'.$siguiendo.' <div class="Tseguir">T</div></div> </a>';	 
	

?>

