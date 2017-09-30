<?php

	$codigo = $_POST['codigo'];

	require_once 'mensaje_privado.php';
	MensajePrivado::borrarMensaje($codigo);

	header("Location:bandeja.php");
	exit();
?>
