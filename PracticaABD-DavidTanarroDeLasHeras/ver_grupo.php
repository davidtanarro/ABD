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


		require_once 'participante.php';
		require_once 'mensaje_grupo.php';
		require_once 'usuario.php';

		if ( isset($_REQUEST['parametro1']) && isset($_REQUEST['parametro2']) ) {
			$idGrupo = $_REQUEST['parametro1'];
			$idUsuario = $_REQUEST['parametro2'];

			if ( !Participante::esParticipante($idGrupo, $idUsuario) ) {	
				$mensaje = "El grupo o el usuario con el que ha intentado acceder no existe o ese usuario no pertenece a ese grupo";
				header("Location: gruposDisponibles.php?mensajeError=".$mensaje);
				exit();
			}

		}
		else {	
			$mensaje = "No se ha recibido bien el usuario o el grupo";
			header("Location: gruposDisponibles.php?mensajeError=".$mensaje);
			exit();
		}
	?>

			<div class="contenedor_tablon">


				<div class="contenedor_enviarMensaje">
					<div class="enviarMensaje">

						<form action="enviarMensajeGrupo.php" id="formularioForo" method="post" onsubmit="return validarFormForo(this);" enctype="multipart/form-data">

							<p> Publica lo que está pasando en el grupo </p>
							<input type="hidden" 	value= "<?php echo $idUsuario;?>" 								name="idUsuario">
							<input type="hidden" 	value= "<?php echo $idGrupo;?>" 								name="idGrupo">
							<input type="text" 	class="input_titulo" placeholder="Titulo" 	 						name="titulo" >
							<input type="text" 	class="input_cuerpo" placeholder="¿Qué está pasando en el grupo?"	name="cuerpo" >

							<input type="submit" class="input_enviar" value="Enviar" onclick="enviarFormulario('formularioForo');" />

						</form>
						
					</div>
				</div>






			<?php

				$listaMensajesGrupo = MensajeGrupo::extraerMensajes($idGrupo);

				for($i=0; $i<sizeof($listaMensajesGrupo); $i++) {
			?>

					<div class="contenedor_mensaje">
						<div class="mensaje">
							<div class="mensaje_titulo">
								<p>	<strong> Usuario: </strong>
									<?php
										$nick = Usuario::extraerNick( $listaMensajesGrupo[$i]['usuario'] );
										echo $nick;
									?>
								</p>
								<p> <strong> Publicado: </strong>
								 	<?php 
								 		echo $listaMensajesGrupo[$i]['fecha'];
								 	?>	
								 </p>
								<p>	<strong> Titulo: </strong>
									<?php 
								 		echo $listaMensajesGrupo[$i]['titulo'];
								 	?>
								 </p>
							</div>
							<div class="mensaje_cuerpo">
								<p>
									<?php 
								 		echo $listaMensajesGrupo[$i]['cuerpo'];
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

