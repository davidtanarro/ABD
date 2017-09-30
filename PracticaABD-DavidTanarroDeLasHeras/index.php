<!DOCTYPE html>
<html>
<head>
	<title>David Tanarro De las Heras</title>

	<meta charset="utf-8" lang="es">
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<script src="js/validarFormulario.js" type="text/javascript"></script>

</head>
<body>

	<?php
		session_start();
		include('cabecera.php');
	?>

	<?php
		if ( isset($_REQUEST['mensajeError']) ) {
	?>
			<div class="contenedor_error">
				<p> <?php echo $_REQUEST['mensajeError'];?> </p>
			</div>
	<?php
		}
	?>

	<div class="contenedor_inicio">


		<div class="contenedor_login">

			<form action="login.php " method="post" class="form1" >
	
				<p> INICIE SESIÓN </p>
				<input class="input_100x15" 	type="text" 		placeholder="Usuario" 	 name="nick">
				<input class="input_100x15" 	type="password" 	placeholder="Contraseña" name="password" >

				<input class="input_100x15" 	type="submit" value="Iniciar sesión" />

			</form>
			
		</div>

		<div class="contenedor_registro">
		
			<form action="registro.php" method="post" class="form1" id="formularioRegistro" onsubmit="return validarFormRegistro(this);" enctype="multipart/form-data" >
	
				<p> REGISTRATE </p>
				<input class="input_100x15" 	type="text" 		placeholder="Nombre" 			name="nombre">
				<input class="input_100x15" 	type="text" 		placeholder="Primer apellido" 	name="apellido1">
				<input class="input_100x15" 	type="text" 		placeholder="Segundo apellido" 	name="apellido2">
				<input class="input_100x15" 	type="text" 		placeholder="Usuario"			name="nick">
				<input class="input_100x15" 	type="password" 	placeholder="Contraseña" 		name="password">
				<input class="input_100x15" 	type="text" 		placeholder="Correo: x@x.xx"	name="email">
				<input class="input_100x15" 	type= "number" 		placeholder="Edad" 				name="edad">

				<input class="input_100x15" 	type="submit" value="Registrarse" onclick="enviarFormulario('formularioRegistro');" />

			</form>
			
		</div>
	
	</div>

</body>
</html>