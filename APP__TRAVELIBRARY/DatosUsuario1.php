<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>TraveLibrary CREAR CUENTA</title>
</head>
<body>
	<?php
		//Traemos desde la página login.php el valorque el usuario ingresó en los CAMPOS
		$nombre = $_POST["nombre"];
        $direccion = $_POST["direccion"];
        $NumTelefono = $_POST["telefono"];
		$metodo_pago = $_POST["metodo"];

        // Iniciamos una SESION (Inicia sesion para crear una variable super global)
			session_start(); 
			 //Almacenamos la información del usuario en una variable SUPER GLOBAL (Que pueden llamarse en cualquier parte del Código)
	        $_SESSION["nombre"] = $nombre;
	        $_SESSION["direccion"] = $direccion;
	        $_SESSION["telefono"] = $NumTelefono;
	        $_SESSION["metodo"] = $metodo_pago;

	        print($_SESSION["NumeroTarjeta"]);

			header ("Location: validar-datosCompra.php");
	?>
</body>
</html>