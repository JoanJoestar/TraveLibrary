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
		$libro = $_POST["libro"];
        $precio = $_POST["precio"];
        $descripcion = $_POST["descripcion"];
        $tema = $_POST["tema"];
        $nombre_libro = $_POST["nombre_libro"];
        $autor = $_POST["autor"];
        $acceso = $_POST["acceso"];

        // Iniciamos una SESION (Inicia sesion para crear una variable super global)
			session_start(); 
			//Almacenamos la información del usuario en una variable SUPER GLOBAL (Que pueden llamarse en cualquier parte del Código)
			$_SESSION["libro"] = $libro;
			$_SESSION["precio"] = $precio;
			$_SESSION["descripcion"] = $descripcion;
			$_SESSION["tema"] = $tema;
			$_SESSION["nombre_libro"] = $nombre_libro;
			$_SESSION["autor"] = $autor;
			$_SESSION["acceso"] = $acceso;

			header ("Location: menu-compraUsuario.php");
	?>
</body>
</html>