<!-- $rutaImagen : String con la dirección de la carpeta donde se guarda la imagen-->
<?php
$rutaImagen="../../img/posts/";
if(isset($_POST)){
	if($_POST["imagen"]<>""){
		// echo $_POST;
		// información de la imagen
		$imagen=$_POST["imagen"];
		// nombre de la imagen
		$nom=$_POST["nombre"];
		// para guardar la imagen me referencié en: 
		// http://www.bufa.es/guardar-imagen-externa-servidor/
		$imagenInfo= explode(',', $imagen);
		$imagenGuardar=$imagenInfo[1];
		$rutaImagen=$rutaImagen.$nom;
		echo "Ruta de la imagen: ".$rutaImagen;
		$imagenDecodificada=base64_decode($imagenGuardar);
	file_put_contents($rutaImagen, $imagenDecodificada);
	}else{
	}
}
?>
