
<?php

	$nombre = $_POST["nombre"];
	$genero = $_POST['genero'];
	$edad = $_POST['edad'];

	require_once 'grupo.php';

	$grupo = new Grupo(NULL, $nombre, $genero, $edad);

	$grupo->crear();	

	header("Location: perfil_admin.php");
	exit();
?>

