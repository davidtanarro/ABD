<?php
	
	$conexion = mysqli_connect("localhost", "root", "", "bd-abd");


	if ( mysqli_connect_errno() ) {
		echo "Error de conexión a la BD: ".mysqli_connect_error();
		exit();
	}


?>