<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>TraveLibrary CREAR CUENTA</title>
</head>
<body>

	<?php
		// PARA VER LOS CAMBIOS COLOCO LA DIRECCION EN EL NAVEGADOR: [http://localhost/FAZ 2021/login/Validar_Login.php]

		//Traemos desde la página login.php el valorque el usuario ingresó en los CAMPOS
		$usuario = $_POST["usuario"];
		$clave = $_POST["clave"];

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

			mysqli_set_charset ($conexion, "UTF8"); //UTF8 --> UTF8

			//Guardamos los Datos de Asistencia en un Array
			$Asistencia = array($usuario,$clave);
			$Buscar ="";
			$resultSearch = in_array($Buscar, $Asistencia);
			$PosicionSearch = array_search($Buscar, $Asistencia);

			if ($resultSearch){
				// Indica que hay datos vacios en el formulario
				// Envía a la página Anterior
				echo "<script type = 'text/javascript'>
				alert('Faltan DATOS por completar en Formulario');
				history.back();
				</script>";
			}else{

				$consultaUsuario = "SELECT USUARIO FROM cuentaUsuario WHERE USUARIO = '$usuario'";

				// Ejecutamos la consulta y a guardamos en un Resultset 
				$resultados = mysqli_query($conexion, $consultaUsuario);

				// Utilizando ARRAY ASOCIATIVO --> MYSQLI_ASSOC --> usamos el NOMBRE DEL CAMPO
				//							   --> MYSQLI_BOTH --> usamos tanto el INDICE como
																	// el NOMBRE del CAMPO
				while($fila = mysqli_fetch_array($resultados, MYSQLI_BOTH)){ // Se asume como si fuera --> == true
					if ($usuario == $fila['USUARIO']){
						echo "<script type = \"text/javascript\">
						alert('EL USUARIO YA EXISTE!!!');
						setTimeout(function () {
						// Redirigir con JavaScript
						window.location.href= 'login2.php';
						}, 0,2000);
						</script>";
						exit();
					}
				}

					$consultaNuevoUsuario = "INSERT INTO cuentaUsuario (USUARIO,CLAVE)
						VALUES('$usuario','$clave')";

						$resultadoNuevoUsuario = mysqli_query($conexion, $consultaNuevoUsuario);

						if($resultadoNuevoUsuario){
							echo "<script type = \"text/javascript\">
							alert('REGISTRO GUARDADO . . .');
							setTimeout(function () {
							// Redirigir con JavaScript
							window.location.href= 'login1.php';
							}, 0,6000);
							</script>";
						}
				}
	?>

</body>
</html>