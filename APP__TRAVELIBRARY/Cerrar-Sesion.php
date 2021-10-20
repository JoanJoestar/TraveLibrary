<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>TraveLibrary - CERRAR SESIÓN</title>
</head>
<body>
	<?php
		// Iniciamos una SESION
		session_start(); 
		session_destroy(); // Rompe el enlace con la Variable SUPER GLOBAL
		header ("Location: login1.php");
	?>
</body>
</html>