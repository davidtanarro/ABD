
<?php

	$idEmisor = $_POST["idEmisor"];
	$idReceptor = $_POST["idReceptor"];
	$asunto = $_POST['asunto'];
	$cuerpo = $_POST['cuerpo'];

	$hoy = date("Y-m-d H:i:s");

	require_once 'mensaje_privado.php';
	require_once 'usuario.php';

	$mensajePrivado = new MensajePrivado(NULL, $idEmisor, $idReceptor, $asunto, $cuerpo, $hoy);

	if ( Usuario::esValido($idReceptor) ) {
		$mensajePrivado->enviar();	

		header("Location: bandeja.php");
		exit();
	}
	else {
		$mensaje = "No existe este receptor";
		header("Location: bandeja.php?mensajeError=".$mensaje);
		exit();
	}
?>

