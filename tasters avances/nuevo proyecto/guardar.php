<?php
if(isset($_POST)){
	if($_POST["imagen"]<>""){
		echo $_POST;
		
		$imagen=$_POST["imagen"];
		$ruta=$_POST["ruta"];
		$direccion=$_POST["direccion"];
		//  para hacer la lectura del JSON me referencié en:
		// http://www.calbertts.com/blog/articulo/intercambio-de-objetos-entre-javascript-y-php-con-json
		
		// $ima = json_decode($_POST["imagen"]);
		// $imagenn = $ima->iimagen;
		// $ruta = $ima->ruta;
		// $direccion = $ima->direccion;

		// para guardar la imagen me referencié en: 
		// http://www.bufa.es/guardar-imagen-externa-servidor/

	// $imagen = file_get_contents("data/imagen.jpg");

		// $imagen = file_get_contents($imagenn);
		$imagenn=imagecreatefromgd(base64_decode($imagen));
		// imagecreatefrom
		file_put_contents($ruta, $imagen);
		// file_put_contents("coso.txt", $ruta);
		echo $ruta." ".$imagen;
		// header("../".$direccion);
	}else{
		echo "noooooo";
	}
}
// echo "error al cargar la imagen";
echo "cosooooo";
?>