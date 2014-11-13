//surpatterns.com/sitio/html5-en-espanol-surpatterns/tutorial-html5-en-espanol-drag-and-drop-y-subida-automatica-en-el-servidor/#sthash.lUKQM2iT.dpuf
// $(document).ready(function(){
	var holder = document.getElementById('holder'),
	tests = {
		filereader: typeof FileReader != 'undefined',
		dnd: 'draggable' in document.createElement('span'),
		formdata: !!window.FormData,
		progress: "upload" in new XMLHttpRequest
	}, 
	support = {
		filereader: document.getElementById('filereader'),
		formdata: document.getElementById('formdata'),
		progress: document.getElementById('progress')
	},
	acceptedTypes = {
		'image/png': true,
		'image/jpeg': true,
		'image/gif': true
	},
	progress = document.getElementById('uploadprogress'),
	fileupload = document.getElementById('upload');

	"filereader formdata progress".split(' ').forEach(function (api) {
		if (tests[api] === false) {
			support[api].className = 'fail';
		} else {
    // FFS. I could have done el.hidden = true, but IE doesn't support
    // hidden, so I tried to create a polyfill that would extend the
    // Element.prototype, but then IE10 doesn't even give me access
    // to the Element object. Brilliant.
    support[api].className = 'hidden';
}
});

	function previewfile(file) {
		if (tests.filereader === true && acceptedTypes[file.type] === true) {
			var reader = new FileReader();
			reader.onload = function (event) {
				var image = new Image();
				image.src = event.target.result;
      image.width = 250; // a fake resize
      holder.appendChild(image);
      
      enviarImagen(image.src,file.name,"hola");
     
      console.log(image.info+" hola "+file.name+" "+image.src);
  };

  reader.readAsDataURL(file);
  console.log("asasdsad "+reader+"  "+file.src);
}  else {
	holder.innerHTML += '<p>Uploaded ' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K' : '');
	console.log(file);
}
}

function readfiles(files) {
	debugger;
	var formData = tests.formdata ? new FormData() : null;
	for (var i = 0; i < files.length; i++) {
		if (tests.formdata) formData.append('file', files[i]);
		previewfile(files[i]);
	}

    // now post a new XHR request
    if (tests.formdata) {
    	var xhr = new XMLHttpRequest();
    	xhr.open('POST', '/icesi/Unidad1-Servidor/nuevo%20proyecto/guardar.php');
    	xhr.onload = function() {
    		// progress.value = progress.innerHTML = 100;
    	};

    	if (tests.progress) {
    		xhr.upload.onprogress = function (event) {
    			if (event.lengthComputable) {
    				var complete = (event.loaded / event.total * 100 | 0);
    				// progress.value = progress.innerHTML = complete;
    			}
    		}
    	}

    	// xhr.send(formData);
    }
}

if (tests.dnd) { 
	holder.ondragover = function () { this.className = 'hover'; return false; };
	holder.ondragend = function () { this.className = ''; return false; };
	holder.ondrop = function (e) {
		this.className = '';
		e.preventDefault();
		readfiles(e.dataTransfer.files);
	};
} else {
	fileupload.className = 'hidden';
	fileupload.querySelector('input').onchange = function () {
		readfiles(this.files);
	};
}

// });


// ---------------------envío de imagen-----------
//  para hacer el envío del JSON me referencié en:
		// http://www.calbertts.com/blog/articulo/intercambio-de-objetos-entre-javascript-y-php-con-json
		

//objeto con la información de la imagen
// function imagen(iimagen,ruta,direccion)		
// {
// 	this.iimagen = iimagen;
// 	this.ruta = ruta;
// 	this.direcion=direccion;
// }

// funcion para enviar una imagen al servidor
// function enviarImagen(iimagen,ruta,direccion)
// {
// 	var ima=imagen(iimagen,ruta,direccion);
// 	var imaJSON=JSON.stringify(ima);
// 	// Realiza el envío  al servidor
// 	$.post('servidor.php', {imagen: imaJSON},
// 		function(respuesta) {
// 			console.log(respuesta);
// 		}).error(
// 		function(){
// 			console.log('Error al ejecutar la petición');
// 		}
// 	}

function imagen(iimagen,ruta,dire)		
{
	this.iimagen = iimagen;
	this.ruta = ruta;
	this.direcion=dire;
}

function enviarImagen(iimagen,ruta,direccion)
{
var ima=new imagen(iimagen,ruta,direccion);
// var imaJSON=JSON.stringify(ima);
// Realiza el envío  al servidor
console.log(ima);

$.ajax({
			type: "POST",
			url: "/icesi/Unidad1-Servidor/nuevo%20proyecto/guardar.php",
			data: { imagen: iimagen, ruta: ruta ,direccion:direccion}
		}).done(function(){
			console.log("Solicitud enviada al API");
		}).success(function(result){
			console.log("Resultado: "+result);
		}).error(function(error){
			console.log("Error: "+error);
		});





// $.post("guardar.php", {imagen: ima},
// 	function(respuesta) {
// 		console.log(respuesta);
// 	}).error(
// 	function(){
// 		console.log('Error al ejecutar la petición');
// 	});
}
