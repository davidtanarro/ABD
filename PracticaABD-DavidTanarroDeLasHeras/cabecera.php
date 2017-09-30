<!DOCTYPE html>
<html>
<head>
	<title>David Tanarro De las Heras</title>
	
	<meta charset="utf-8" lang="es">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

	<header>
		<div class="ancho_cabecera">

			<div class="logo">
				<?php
					if (isset($_SESSION["admin"]))
						echo "<p><a href=perfil_admin.php>Tertulianos</a></p>";
					else if(isset($_SESSION["login"]))
						echo "<p><a href=foro.php>Tertulianos</a></p>";
					else
						echo "<p><a href=index.php>Tertulianos</a></p>";
				?>
			</div>

			
			<nav class="menu_cabecera">
				<ul>
					<?php
						function mostrarSaludo() {
							if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
								echo $_SESSION['nombre'] . " " . "<a href='logout.php'>Cerrar sesión</a>";
							} 
							else if(isset($_SESSION["admin"]) && ($_SESSION["admin"]===true)){
								echo $_SESSION['nombre'] . " " . "<a href='logout.php'>Cerrar sesión</a>";
							}
						}

						mostrarSaludo();
					?>
				</ul>
			</nav>
			
		</div>
	</header>

</body>
</html>