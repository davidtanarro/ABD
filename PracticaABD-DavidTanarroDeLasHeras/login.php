
<?php

	$nick = $_POST["nick"];
	$password = $_POST['password'];

	require_once 'usuario.php';

	$us = new Usuario(NULL, $nick, $password, NULL, NULL, NULL, NULL);

	if ( $us->loguear() > 0 ) {

		session_start();

		$_SESSION["login"] = true;
		
		if($nick == "admin") {
			$_SESSION["nombre"] = "administrador";
			header("Location: perfil_admin.php");
		}
		else {
			$_SESSION["nombre"] = $nick;
			header("Location: foro.php");
		}
		exit();

	}
	else {
		$mensaje = "El usuario no está registrado o su contraseña es erronea";
		header("Location: index.php?mensajeError=".$mensaje);
		exit();
	}
?>

