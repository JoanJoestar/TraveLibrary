<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>TraveLibrary - ACTUALIZACIÓN DE DATOS</title>
	<!--<link rel="stylesheet" type="text/css" href="">
	<script type="text/javascript"></script>-->
</head>
<body>

	<?php
		// PARA VER LOS CAMBIOS COLOCO LA DIRECCION EN EL NAVEGADOR: [http://localhost/FAZ 2021/login/Validar_Login.php]

		session_start();
		// $_SESSION["usuario"]

		//Traemos desde la página login.php el valorque el usuario ingresó en los CAMPOS

		$NumPedido = $_POST["NumPedido"];

		//Datos para ubicar elsevidor BBDD
		//Los traemosdesde el archivo php
		require("Datos_ConexionBBDD.php");

		//Establecemosla conexion con la base de datos 
		//**** Primero con el Host:
		$conexion =mysqli_connect($db_host, $db_usuario, $db_clave);

		if(mysqli_connect_errno()){
			echo "Error al conectar con la Base de Datos";
			exit();  //Salimos de la Conexión
		}

		//**** Segundo son la Bse de Datos
			//Si no la encuentra nos informa el Error
			mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD");
			// Confirmamos que vamos a usar caracteres latinos
			// Para efectos de las Tildes

			mysqli_set_charset ($conexion, "UTF8"); //UTF8 --> UTF

				$consulta = "UPDATE datos_compra SET EstadoPedido = 'Entregado' WHERE NumPedido='$NumPedido'";

				$resultados1= mysqli_query($conexion,$consulta);

				if ($resultados1) {
					echo "<script>
			        setTimeout(function cerrar () {
			            abrir_app();
			        },100);

			        function abrir_app(){
			            window.location.href = 'bandeja_pedidos__Domiciliario.php';
			        }
  
					</script>";
				}
	?>

</body>
</html>