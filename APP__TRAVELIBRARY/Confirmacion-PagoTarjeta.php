<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <!-- RESPONSIVE DESIGN -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ICONO DEL PROYECTO -->
    <link rel="icon" href="img/Logo-ProyectoTB1.png" type="image/img" >
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>TraveLibrary - DATOS DE LA TARJETA DE CREDITO</title>
</head>
<body>
	<?php
		// PARA VER LOS CAMBIOS COLOCO LA DIRECCION EN EL NAVEGADOR: [http://localhost/FAZ 2021/login/.php]

        //Revisamos que el usuario haya iniciado SESIÓN
        require("Validar-EntradaLogin.php");

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

			$datos = array( $_SESSION["NumeroTarjeta"], $_SESSION["CodigoTarjeta"], $_SESSION["VencimientoTarjeta"]);
			$Buscar ="";
			$resultSearch = in_array($Buscar, $datos);
			$PosicionSearch = array_search($Buscar, $datos);

			if ($resultSearch){
				// Indica que hay datos vacios en el formulario
				// Envía a la página Anterior
				echo "<script type = 'text/javascript'>
				alert('Faltan DATOS por completar . . .');
                history.back()
				</script>";
				exit();
			}
			else{
                   //VALIDACION DE LOS DATOS DEL PEDIDO
                    $consulta = "INSERT INTO datos_compra (nombre, libro, precio, direccion, metodo, fecha, EstadoPedido, USUARIO, NumTelefono) VALUES ('".$_SESSION["nombre"]."', '".$_SESSION["nombre_libro"]."', '".$_SESSION["precio"]."','". $_SESSION["direccion"]."', '".$_SESSION["metodo"]."', '".$_SESSION["fechaActual"]."', 'Sin entregar', '".$_SESSION["usuario"]."','".$_SESSION["telefono"]."')";

					// Ejecutamos la consulta y a guardamos en un Resultset 
					$resultados = mysqli_query($conexion, $consulta);

					if($resultados){
                             
							echo "
                                <div class='Div-pantalla-fondo_ventana'>
                                    <div class='contenedor_datos'>
                                        <div class='encabezado'>
                                            <h1>¡COMPRA REALIZADA!</h1>
                                            <img src='img/Logo-ProyectoTB1.png'>
                                        </div>
                                        <p>!Gracias por comprar con TraveLibrary! . . .</p>
                                        <p>!Su pedido se enviara pronto! . . .</p>
                                    </div>
                                </div>

                            <script>
                                setTimeout(function cerrar () {
                                    abrir_app();
                                },3000);

                                function abrir_app(){
                                    window.location.href ='metodo-pago.php';
                                }
                            </script>
                           ";
					}
				}
	?>

    <style>

        *{
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman';
            font-size: 20px;
            text-decoration: none;
            color: white;
        }

        body{
            background-color: #000;
        }


        /* VENTANA DE CONFIRMACION */
        .Div-pantalla-fondo_ventana{
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('img/fondo1.png') center/cover;
            height: 100vh;
        }

        .contenedor_datos{
            width: 17em;
            height: 25em;
            background-color: slateblue;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 2em;
            box-shadow: 8px 8px 4px darkslateblue;
        }

        .contenedor_datos p{
            font-size: 1.3em;
            text-align: center;
            margin: .5em;
        }

        .encabezado{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .encabezado img{
            width: 50%;
            padding: .5em;
        }

        h1{
            text-align: center;
            width: 90%;
            padding: 5px;
            font-size: 30px;
            background-color: darkslateblue;
        }

    </style>

    <!-- SCROLL REVEAL -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        ScrollReveal().reveal('.contenedor_datos', {delay: 300});
    </script>
</body>
</html>