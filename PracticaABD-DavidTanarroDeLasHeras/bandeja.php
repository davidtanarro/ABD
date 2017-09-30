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

					<form action="enviarMensajePrivado.php " id="formularioBandeja" method="post" onsubmit="return validarFormBandeja(this);" enctype="multipart/form-data">
						<?php
							require_once 'usuario.php';
							
							$idUsuario = Usuario::extraerId($_SESSION["nombre"]);
						?>

						<p> Envía un mensaje privado </p>
			
						<input type="hidden" value= "<?php echo $idUsuario;?>"	name="idEmisor">


						<select type="text" 	class="input_titulo" 			name="idReceptor" >
								<option value='' SELECTED> 
									Seleccione el nick del destinatario
								</option>
						<?php 
							$listaUsuarios = Usuario::extraerUsuarios($idUsuario);

							for($i=0; $i<sizeof($listaUsuarios); $i++) {
								$aux_nick = $listaUsuarios[$i]['nick'];
								$aux_idReceptor = $listaUsuarios[$i]['id'];
						?>
								<option value='<?php echo $aux_idReceptor; ?>'> 
									<?php echo $aux_nick; ?>
								</option>
						<?php 
							}
						?>
						</select>

						
						<input type="text" 	class="input_titulo" placeholder="Escriba el asunto"	name="asunto" >
						<input type="text" 	class="input_cuerpo" placeholder="Escribe tu mensaje"	name="cuerpo" >

						<input type="submit" class="input_enviar" value="Enviar" onclick="enviarFormulario('formularioBandeja');" />

					</form>
					
				</div>
			</div>









			<div class="contenedor_lista_mensajes">

			<div class="titulo">
				<hr />
				<p> Bandeja de entrada </p>
				<hr />
			</div>

			<?php
				require_once 'usuario.php';
				require_once 'mensaje_privado.php';

				$idUsuario = Usuario::extraerId($_SESSION["nombre"]);

				$listaMensajesRecibidos = MensajePrivado::extraerMensajesRecibidos($idUsuario);

				if (sizeof($listaMensajesRecibidos) == 0) {
			?>
					<div class="notificacion">
						<p> No has recibido ningun mensaje </p>
					</div>
			<?php 
				}

				for($i=0; $i<sizeof($listaMensajesRecibidos); $i++) {
			?>

					<div class="contenedor_mensaje">
						<div class="mensaje">
							<div class="mensaje_titulo">
								<p>	<strong> De: </strong>
									<?php
										$nickEmisor = Usuario::extraerNick( $listaMensajesRecibidos[$i]['emisor'] );
										echo $nickEmisor;
									?>
								</p>
								<p>	<strong> Para: </strong>
									<?php
										$nickReceptor = Usuario::extraerNick( $listaMensajesRecibidos[$i]['receptor'] );
										echo $nickReceptor;
									?>
								</p>
								<p> <strong> Publicado: </strong>
								 	<?php 
								 		echo $listaMensajesRecibidos[$i]['fecha'];
								 	?>	
								</p>
								<p>	<strong> Asunto: </strong>
									<?php 
								 		echo $listaMensajesRecibidos[$i]['asunto'];
								 	?>
								</p>
							</div>
							
							<div class="mensaje_cuerpo">
								<p>
									<?php 
								 		echo $listaMensajesRecibidos[$i]['mensaje'];
								 	?>
								</p>
							</div>
							
							<form action="borrarMensajePrivado.php " method="post">
								<?php
									$codigo = $listaMensajesRecibidos[$i]['codigo'];
								?>
								<input type="hidden" value= "<?php echo $codigo;?>"		name="codigo">
								
								<input type="submit" class="input_enviar" value="Borrar" >
							</form>
						</div>
					</div>
			<?php
				}
			?>
			</div>














			<div class="contenedor_lista_mensajes">
			
			<div class="titulo">
				<hr />
				<p> Bandeja de salida </p>
				<hr />
			</div>
				

			<?php
				require_once 'usuario.php';
				require_once 'mensaje_privado.php';

				$idUsuario = Usuario::extraerId($_SESSION["nombre"]);

				$listaMensajesEnviados = MensajePrivado::extraerMensajesEnviados($idUsuario);

				if (sizeof($listaMensajesEnviados)== 0) {
			?>
					<div class="notificacion">
						<p> No has enviado ningun mensaje </p>
					</div>
			<?php 
				}

				for($i=0; $i<sizeof($listaMensajesEnviados); $i++) {
			?>

					<div class="contenedor_mensaje">
						<div class="mensaje">
							<div class="mensaje_titulo">
								<p>	<strong> De: </strong>
									<?php
										$nick = Usuario::extraerNick( $listaMensajesEnviados[$i]['emisor'] );
										echo $nick;
									?>
								</p>
								<p>	<strong> Para: </strong>
									<?php
										$nick = Usuario::extraerNick( $listaMensajesEnviados[$i]['receptor'] );
										echo $nick;
									?>
								</p>
								<p> <strong> Publicado: </strong>
								 	<?php 
								 		echo $listaMensajesEnviados[$i]['fecha'];
								 	?>	
								</p>
								<p>	<strong> Asunto: </strong>
									<?php 
								 		echo $listaMensajesEnviados[$i]['asunto'];
								 	?>
								</p>
							</div>
							
							<div class="mensaje_cuerpo">
								<p>
									<?php 
								 		echo $listaMensajesEnviados[$i]['mensaje'];
								 	?>
								</p>
							</div>


							<form action="borrarMensajePrivado.php " method="post">
								<?php
									$codigo = $listaMensajesEnviados[$i]['codigo'];
								?>
								<input type="hidden" value= "<?php echo $codigo;?>"		name="codigo">
								
								<input type="submit" class="input_enviar" value="Borrar" >
							</form>
						</div>
					</div>
			<?php
				}
			?>
			</div>


		</div>

</body>
</html>