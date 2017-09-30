function validarFormForo(form) {

	//----------------Validacion idUsuario-----------------//
	if(form.idUsuario.value.length==0 ) { 
		form.idUsuario.focus();
		alert('Debe seleccionar un id de usuario.');
		return false;
	}
	
	//----------------Validacion titulo-----------------//
	if(form.titulo.value.length==0 ) { 
		form.titulo.focus();
		alert('Debe escribir un titulo.'); 
		return false;
	}
	
	//----------------Validacion cuerpo-----------------//
	if(form.cuerpo.value.length==0 ) { 
		form.cuerpo.focus();
		alert('Debe escribir un texto en el mensaje.'); 
		return false;
	}
}

function validarFormBandeja(form) {

	//----------------Validacion idReceptor-----------------//
	if(form.idReceptor.value.length==0 ) { 
		form.idReceptor.focus();
		alert('Debe seleccionar un destinatario.');
		return false;
	}
	
	//----------------Validacion asunto-----------------//
	if(form.asunto.value.length==0 ) { 
		form.asunto.focus();
		alert('Debe escribir un asunto.'); 
		return false;
	}
	
	//----------------Validacion cuerpo-----------------//
	if(form.cuerpo.value.length==0 ) { 
		form.cuerpo.focus();
		alert('Debe escribir un texto en el mensaje.'); 
		return false;
	}
}

function validarFormRegistro(form) {

	//----------------Validacion nombre-----------------//
	if(form.nombre.value.length==0 ) { 
		form.nombre.focus();
		alert('Debe escribir un nombre.'); 
		
		return false;
	}
	
	if(form.nombre.value.length>=51 ) {
		form.nombre.focus();
		alert('Por favor, introduzca un nombre con un m\341ximo de 50 caracteres');
		
		return false;
	}	
	
	if (!(/^[a-zA-Z\u00f1\u00d1\ÑñáéíóúÁÉÍÓÚs]+$/.test(form.nombre.value))){
		alert("Por favor, utilice s\363lo letras como nombre.");
		
		return false;
	}
	
	//----------------Validacion apellido 1-----------------//
	if(form.apellido1.value.length==0 ) { 
		form.apellido1.focus();
		alert('Debe escribir un primer apellido.');
		
		return false;
	}
	
	if(form.apellido1.value.length>=101 ) { 
		form.apellido1.focus();
		alert('Por favor, introduzca un primer apellido con un m\341ximo de 10 caracteres'); 
		
		return false; 
	}
	
	if (!(/^[a-zA-Z\u00f1\u00d1\ÑñáéíóúÁÉÍÓÚs]+$/.test(form.apellido1.value))){
		alert("Por favor, utilice s\363lo letras como primer apellido.");
		
		return false;
	}

	//----------------Validacion apellido 2-----------------//
	if(form.apellido2.value.length==0 ) { 
		form.apellido2.focus();
		alert('Debe escribir un segundo apellido.');
		
		return false; 
	}
	
	if(form.apellido2.value.length>=101 ) { 
		form.apellido2.focus();
		alert('Por favor, introduzca un segundo apellido con un m\341ximo de 10 caracteres'); 
		
		return false; 
	}
	
	if (!(/^[a-zA-Z\u00f1\u00d1\ÑñáéíóúÁÉÍÓÚs]+$/.test(form.apellido2.value))){
		alert("Por favor, utilice s\363lo letras como segundo apellido.");
		
		return false;
	}
	
	
	
	//----------------Validacion Nick-----------------//
	if(form.nick.value.length==0 ) { 
		form.nick.focus();
		alert('Debe escribir un nick.');
		
		return false;
	}
	
	if(form.nick.value.length>=26 ) {
		form.nick.focus();
		alert('Por favor, introduzca un nick con un m\341ximo de 25 caracteres'); 
		
		return false;
	}	
	
	if (!(/^[a-zA-Z0-9\u00f1\u00d1\ÑñáéíóúÁÉÍÓÚs]+$/.test(form.nick.value))){
		alert("Por favor, utilice s\363lo letras y n\372meros como nombre de usuario.");
		
		return false;
	}

	//----------------Validacion contraseña-----------------//
	if(form.password.value.length<5 || form.password.value.length>=21 ) {
		form.password.focus();
		alert('Por favor, introduzca una contrase\361a con un m\355nimo de 5 caracteres y un m\341ximo 20'); 
		
		return false;
	}

	if (!(/^([a-zA-Z0-9_.\u00f1\u00d1\ÑñáéíóúÁÉÍÓÚs])+$/.test(form.password.value))){
		alert("Por favor, utilice s\363lo letras, n\372meros, barra baja o puntos.");
		
		return false;
	}

	//----------------Validacion email-----------------//
	if(form.email.value.length==0) { 
		form.email.focus();
		alert('No has escrito tu email');
		
		return false;
	}

	var filtro = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
	if (!(filtro).test(form.email.value)) {
		alert('No has escrito bien tu email');
		
		return false;
	}
	
	//----------------Validacion edad-----------------//
	if(form.edad.value.length==0 ) { 
		form.edad.focus(); 
		alert('Debe escribir un n\372mero.'); 
		
		return false; 
	}
	
	if (!(/^[0-9\u00f1\u00d1\s]+$/.test(form.edad.value))){
		alert("Por favor, utilice s\363lo n\372meros.");
		
		return false;
	}
	
}

function validarFormGrupo(form) {
	
	//----------------Validacion nombre-----------------//
	if(form.nombre.value.length==0 ) { 
		form.nombre.focus();
		alert('Debe escribir un nombre.'); 
		
		return false;
	}
	
	if(form.nombre.value.length>=51 ) {
		form.nombre.focus();
		alert('Por favor, introduzca un nombre con un m\341ximo de 50 caracteres');
		
		return false;
	}
	
	//----------------Validacion genero-----------------//
	if(form.genero.value.length==0 ) { 
		form.genero.focus();
		alert('Debe escribir un genero.'); 
		
		return false;
	}
	
	if(form.genero.value.length>=51 ) {
		form.genero.focus();
		alert('Por favor, introduzca un genero con un m\341ximo de 50 caracteres');
		
		return false;
	}

	//----------------Validacion edad-----------------//
	if(form.edad.value.length==0 ) { 
		form.edad.focus(); 
		alert('Debe escribir un n\372mero.'); 
		
		return false; 
	}
	
	if (!(/^[0-9\u00f1\u00d1\s]+$/.test(form.edad.value))){
		alert("Por favor, utilice s\363lo n\372meros.");
		
		return false;
	}
	
}
