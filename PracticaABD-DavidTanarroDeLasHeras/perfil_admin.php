<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Administracion</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<script src="js/validarFormulario.js" type="text/javascript"></script>
</head>


<body>

	<?php
		session_start();
		include('cabecera.php');


		if ( isset($_REQUEST['mensajeError']) ) {
	?>
			<div class="contenedor_error">
				<p> <?php echo $_REQUEST['mensajeError'];?> </p>
			</div>
	<?php
		}
	?>

			<div class="contenedor_tablon">


				<div class="contenedor_enviarMensaje">
					<div class="enviarMensaje">

						<form action="aniadirGrupo.php" id="formularioGrupo" method="post" onsubmit="return validarFormGrupo(this);" enctype="multipart/form-data">
				
							<p> Añade un nuevo grupo </p>
							<input type="text" 		class="input_titulo" placeholder="Nombre del grupo"		name="nombre" >

							<select  class="input_cuerpo" 	name='genero'>
								<option value='' SELECTED>Seleccionar genero musical</option>
								<option value='Rock'>	  Rock		</option>
								<option value='Pop'>	  Pop		</option>
								<option value='Rap'>	  Rap		</option>
								<option value='Hip-Hop'>  Hip-Hop	</option>
								<option value='Reggae'>	  Reggae 	</option>
								<option value='Reggaeton'>Reggaeton	</option>
								<option value='Clasica'>  Clasica	</option>
								<option value='Metal'>	  Metal		</option>
								<option value='Balada'>	  Balada	</option>
								<option value='Salsa'>	  Salsa		</option>
								<option value='Jazz'>	  Jazz		</option>
								<option value='Cumbia'>	  Cumbia	</option>
								<option value='Dance'>	  Dance		</option>
								<option value='Ska'>	  Ska		</option>
								<option value='Tecno'>	  Tecno		</option>
								<option value='Flamenco'> Flamenco	</option>
							</select>
							

							<input type="number" 	class="input_cuerpo" placeholder="Edad minima"			name="edad" >

							<input type="submit" class="input_enviar" value="Añadir" onclick="enviarFormulario('formularioGrupo');" />

						</form>
						
					</div>
				</div>
				

			</div>

</body>
</html>

