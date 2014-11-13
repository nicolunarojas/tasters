
// ---------------------envío de imagen-----------
//  para hacer el envío del JSON me referencié en:
		// http://www.calbertts.com/blog/articulo/intercambio-de-objetos-entre-javascript-y-php-con-json
		

//objeto con la información de la imagen
function imagen(iimagen,ruta,direccion)		
{
	this.iimagen = iimagen;
	this.ruta = ruta;
	this.direcion=direccion;
}

// funcion para enviar una imagen al servidor
function enviarImagen(iimagen,ruta,direccion)
{
	var ima=imagen(iimagen,ruta,direccion);
	var imaJSON=JSON.stringify(ima);
	// Realiza el envío  al servidor
	$.post('servidor.php', {imagen: imaJSON},
		function(respuesta) {
			console.log(respuesta);
		}).error(
		function(){
			console.log('Error al ejecutar la petición');
		}
	}
