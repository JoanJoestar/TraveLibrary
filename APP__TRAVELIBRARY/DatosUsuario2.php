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
		$NumeroTarjeta = $_POST["NumeroT"];
		$CodigoTarjeta = $_POST["CodigoT"];
		$VencimientoTarjeta = $_POST["FechaT"];

        // Iniciamos una SESION (Inicia sesion para crear una variable super global)
			session_start(); 
			 //Almacenamos la información del usuario en una variable SUPER GLOBAL (Que pueden llamarse en cualquier parte del Código)
	        $_SESSION["NumeroTarjeta"] = $NumeroTarjeta;
	        $_SESSION["CodigoTarjeta"] = $CodigoTarjeta;
	        $_SESSION["VencimientoTarjeta"] = $VencimientoTarjeta;

	        print($_SESSION["NumeroTarjeta"]);

			header ("Location: Confirmacion-PagoTarjeta.php");
	?>
</body>
</html>