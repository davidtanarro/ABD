<?php

	$nombre = $_POST["nombre"];
	$apellido1 = $_POST["apellido1"];
	$apellido2 = $_POST["apellido2"];
	$apellido1 = $apellido1 . " " . $apellido2;
	$nick = $_POST["nick"];
	$password = $_POST['password'];
	$edad = $_POST["edad"];
	$email = $_POST["email"];
	
	// $fecha = date("Y-m-d");

	$pass_cifrada = password_hash($password, PASSWORD_DEFAULT);

	require_once 'usuario.php';

	$us = new Usuario(NULL, $nick, $pass_cifrada, $nombre, $apellido1, $email, $edad);

	if($us->verificar()){
			echo "verifica ";
			echo $us->nick;
	 	if($us->insertar()){
			echo "inserta ";

			session_start();
			
			$_SESSION["login"] = true;
			$_SESSION["nombre"] = $nick;

			header("Location: foro.php");
			exit;
	 	}
	 }
	else {
		$mensaje = "El nick del usuario ya existe, por favor intentelo de nuevo";
		header("Location: index.php?mensajeError=".$mensaje);
		exit;
	}

?>