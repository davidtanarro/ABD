
<?php

	$idUsuario = $_POST["idUsuario"];
	$idGrupo = $_POST["idGrupo"];
	$titulo = $_POST['titulo'];
	$cuerpo = $_POST['cuerpo'];

	require_once 'mensaje_grupo.php';

	$hoy = date("Y-m-d H:i:s");
	$mensajeGrupo = new MensajeGrupo(NULL, $idUsuario, $titulo, $cuerpo, $hoy, $idGrupo);

	$mensajeGrupo->enviar();	

	header("Location: ver_grupo.php?parametro1=".$idGrupo."&parametro2=".$idUsuario);
	exit();
?>

