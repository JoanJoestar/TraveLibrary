<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>TraveLibrary CREAR CUENTA</title>
</head>
<body>
	<?php
		//Traemos desde la página los valores de los libros
		$busqueda= $_POST["search"];
        
        // Iniciamos una SESION (Inicia sesion para crear una variable super global)
			session_start(); 
			//Almacenamos la información del usuario en una variable SUPER GLOBAL (Que pueden llamarse en cualquier parte del Código)
			$_SESSION["busqueda"] = $busqueda;

			header ("Location: validar_resultados.php");
	?>
</body>
</html>