
<?php

	$idUsuario = $_POST["idUsuario"];
	$titulo = $_POST['titulo'];
	$cuerpo = $_POST['cuerpo'];

	require_once 'mensaje_publico.php';

	$hoy = date("Y-m-d H:i:s");
	$mensajePublico = new MensajePublico(NULL, $idUsuario, $titulo, $cuerpo, $hoy);

	$mensajePublico->enviar();	

	header("Location: foro.php");
	exit();
?>

