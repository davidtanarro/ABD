<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Foro</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<script src="js/validarFormulario.js" type="text/javascript"></script>
</head>


<body>

	<?php
		session_start();
		include('cabecera.php');
		include('toolbar.php');


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

						<form action="enviarMensaje.php " id="formularioForo" method="post" onsubmit="return validarFormForo(this);" enctype="multipart/form-data">
							<?php
								require_once 'usuario.php';
								
								$idUsuario = Usuario::extraerId($_SESSION["nombre"]);
							?>
				
							<p> Publica lo que está pasando </p>
							<input type="hidden" 	value= "<?php echo $idUsuario;?>" 					name="idUsuario">
							<input type="text" 	class="input_titulo" placeholder="Titulo" 	 			name="titulo" >
							<input type="text" 	class="input_cuerpo" placeholder="¿Qué está pasando?"	name="cuerpo" >

							<input type="submit" class="input_enviar" value="Enviar" onclick="enviarFormulario('formularioForo');" />

						</form>
						
					</div>
				</div>



			<?php
				require_once 'usuario.php';
				require_once 'mensaje_publico.php';

				$listaMensajesForo = MensajePublico::extraerMensajes();

				for($i=0; $i<sizeof($listaMensajesForo); $i++) {
			?>

					<div class="contenedor_mensaje">
						<div class="mensaje">
							<div class="mensaje_titulo">
								<p>	<strong> Usuario: </strong>
									<?php
										$nick = Usuario::extraerNick( $listaMensajesForo[$i]['usuario'] );
										echo $nick;
									?>
								</p>
								<p> <strong> Publicado: </strong>
								 	<?php 
								 		echo $listaMensajesForo[$i]['fecha'];
								 	?>	
								 </p>
								<p>	<strong> Titulo: </strong>
									<?php 
								 		echo $listaMensajesForo[$i]['titulo'];
								 	?>
								 </p>
							</div>
							<div class="mensaje_cuerpo">
								<p>
									<?php 
								 		echo $listaMensajesForo[$i]['cuerpo'];
								 	?>
								</p>
							</div>
						</div>
					</div>
			<?php
				}
			?>


			</div>

</body>
</html>

