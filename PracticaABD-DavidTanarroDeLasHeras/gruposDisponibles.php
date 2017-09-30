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

			<div class="contenedor_tabla">
				<table>
					<caption>Tus grupos</caption>
					<tr>
					   <th>Grupo</th>
					   <th>Genero</th>
					   <th>Edad mínima</th>
					   <th>Ver foro del grupo</th>
					   <th>Salir del grupo</th>
					</tr>

				<?php
					require_once 'usuario.php';
					require_once 'participante.php';
					
					$idUsuario = Usuario::extraerId($_SESSION["nombre"]);
					$listaGruposPerteneciente = Participante::extraerGruposPerteneciente($idUsuario);

					for($i=0; $i<sizeof($listaGruposPerteneciente); $i++) {
				?>
						<tr>
							<td>				
							 	<?php 
							 		echo $listaGruposPerteneciente[$i]['nombre'];
							 	?>
							</td>
							<td>
								<?php 
							 		echo $listaGruposPerteneciente[$i]['genero'];
							 	?>
							</td>
							<td>
							 	<?php 
							 		echo $listaGruposPerteneciente[$i]['edad'];
							 	?>
							</td>
							<td>
								<form action="ver_grupo.php" method="post">
									<?php 
										$idGrupo = $listaGruposPerteneciente[$i]['idGrupo'];
									?>
									<input type="hidden" value= "<?php echo $idGrupo;?>" 	name="parametro1">
									<input type="hidden" value= "<?php echo $idUsuario;?>" 	name="parametro2">

									<input type="submit" class="input_100x15" value="Ver foro del grupo">
								</form>
							</td>
							<td>
								<form action="salir_de_grupo.php" method="post">
									<?php 
										$idGrupo = $listaGruposPerteneciente[$i]['idGrupo'];
									?>
									<input type="hidden" value= "<?php echo $idGrupo;?>" 	name="parametro1">
									<input type="hidden" value= "<?php echo $idUsuario;?>" 	name="parametro2">

									<input type="submit" class="input_100x15" value="Salir del grupo">
								</form>
							</td>
				<?php
					}
				?>
				</table>
			</div>








			<div class="contenedor_tabla">
				<table>
					<caption>Grupos disponibles</caption>
					<tr>
					   <th>Grupo</th>
					   <th>Genero</th>
					   <th>Edad mínima</th>
					   <th>Entrar en el grupo</th>
					</tr>

				<?php
					require_once 'usuario.php';
					require_once 'participante.php';
					
					$idUsuario = Usuario::extraerId($_SESSION["nombre"]);
					$listaGruposDisponibles = Participante::extraerGruposDisponibles($idUsuario);

					for($i=0; $i<sizeof($listaGruposDisponibles); $i++) {
				?>
						<tr>
							<td>				
							 	<?php 
							 		echo $listaGruposDisponibles[$i]['nombre'];
							 	?>
							</td>
							<td>
								<?php 
							 		echo $listaGruposDisponibles[$i]['genero'];
							 	?>
							</td>
							<td>
							 	<?php 
							 		echo $listaGruposDisponibles[$i]['edad'];
							 	?>
							</td>
							<td>
								<form action="entrar_en_grupo.php" method="post">
									<?php 
										$idGrupo = $listaGruposDisponibles[$i]['idGrupo'];
									?>
									<input type="hidden" value= "<?php echo $idGrupo;?>"	name="parametro1">
									<input type="hidden" value= "<?php echo $idUsuario;?>" 	name="parametro2">

									<input type="submit" class="input_100x15" value="Entrar en el grupo">
								</form>
							</td>
				<?php
					}
				?>
				</table>
			</div>

</body>
</html>

