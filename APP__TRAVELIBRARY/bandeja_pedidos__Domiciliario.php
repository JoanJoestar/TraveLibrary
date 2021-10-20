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
    <title>TraveLibrary - MENÚ PEDIDOS</title>
</head>
<body>
    <div class="Div-pantalla-fondo">
        <div class="contenedor-pasarela">
            <div class="contenedor-titulo">
                    <h2>Pedidos</h2>
                    <div class="menu-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
                <nav class="nav-main">
                    <ul class="nav-menu">
                        <li><a href="login1.php">Cerrar Sesión</a></li>
                    </ul>
                </nav>
            <div class="bandeja_pedidos">
		<?php

		// PARA VER LOS CAMBIOS COLOCO LA DIRECCION EN EL NAVEGADOR: [http://localhost/APP__TRAVELIBRARY/bandeja_pedidos__Domiciliario.php]

            //Revisamos que el usuario haya iniciado SESIÓN
            require("Validar-EntradaLogin.php");

			//Ubicamos el servidor y nos conectamos a la BBDD
			require("Datos_ConexionBBDD.php");

			$conexion =mysqli_connect($db_host, $db_usuario, $db_clave);

			if(mysqli_connect_errno()){
				echo "Error al conectar con la Base de Datos";
				exit();  //Salimos de la Conexión
			}

			//Si no la encuentra nos informa el Error
			mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD");
			// Confirmamos que vamos a usar caracteres latinos
			// Para efectos de las Tildes

			mysqli_set_charset ($conexion, "UTF8");

				$consulta = "SELECT * FROM datos_compra WHERE EstadoPedido = 'Sin entregar'";

				$resultados= mysqli_query($conexion,$consulta);

				$registros = 0;

				while($fila=mysqli_fetch_array($resultados, MYSQLI_BOTH)){
                echo "<form action = 'Actualizar-datos_compra.php' method = 'post'>";
                    echo "<table class='tabla-pedidos'>";
                        echo"<h1>Pedido: " .$fila['NumPedido'] . "</h1>";
                        echo "<input type = 'text' id='NumPedido' name ='NumPedido' value= '" .$fila['NumPedido'] . "' readonly></td></tr>";
                        echo "<tr><td>Nombre del Comprador: </td><td><input type = 'text' name = 'nombre' value= '" .$fila['nombre'] . "' readonly></td></tr>";
                        echo "<tr><td>Nombre del Libro: </td><td><input type = 'text' name = 'nombre_libro' value= '" .$fila['libro'] . "'readonly></td></tr>";
                        echo "<tr><td>Precio del libro: </td><td><input type = 'text' name = 'precio' value= '" .$fila['precio'] . "' readonly></td></tr>";
                        echo "<tr><td>Dirección: </td><td><input type = 'text' name = 'direccion' value= '" .$fila['direccion'] . "' readonly></td></tr>";
                        echo "<tr><td>Metodo de Pago: </td><td><input type = 'text' name = 'metodo' value= '" .$fila['metodo'] . "' readonly></td></tr>";
                        echo "<tr><td>Fecha del Pedido: </td><td><input type = 'text' name = 'fecha' value= '" .$fila['fecha'] . "' readonly></td></tr>";
                        echo "<tr><td>Número del comprador: </td><td><input type = 'text' name = 'fecha' value= '" .$fila['NumTelefono'] . "' readonly></td></tr>";
                        echo"<tr><td><input type='submit' name='enviando' id='buscar' value='Pedido Realizado'></td></tr>";
                    echo "</table>";
                echo "</form>";
                
                $registros ++;
            }

            if($registros==0){
            echo"
                <h1>No hay pedidos ACTUALMENTE . . .</h1>";
            }
        ?>
            </div>
        </div>
    </div>


        <!-- CUSTOM CSS -->
        <style type="text/css">

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

        /* FONDO DE PANTALLA */
        .Div-pantalla-fondo{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            background: url('img/fondo1.png')  center/cover;
            height: 100vh;
        }

        /* BOTON-MENU */
        .menu-btn{
            cursor: pointer;
            padding: .3em;
            margin-left: 95%;
        }

        .menu-btn i{
            color: #fff;
            font-size: 1.5rem;
        }

        .nav-main ul.nav-menu {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            background: #2f3640;
            height: 89vh;
            padding: 30px;
            opacity: .9;
            transform: translateX(-400px);
            transition: transform .5s ease-in-out;
        }

        .nav-main ul.nav-menu.show{
            transform: translateX(-20px);
        }

        .nav-main ul.nav-menu li{
            padding: 20px;
            border-bottom: #ccc solid 1px;
        }

        .nav-main ul.nav-menu-right{
            margin-right: 40px;
        }

        /* MENU PRINCIPAL-USUARIO */
        .contenedor-pasarela{
            width: 60%;
            height: 80%;
            background-color: slateblue;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 2em;
            box-shadow: 8px 8px 4px darkslateblue;
            padding: 10px;
        }

        .bandeja_pedidos{
            height: 80%;
            width: 100%;
            overflow: auto;
        }

        form{
            margin: 1em;
        }

            .tabla-pedidos{
                margin: auto;
                height: 80%;
                width: 100%;
                background-color: #000;
                border-radius: 2em;
                padding: 10px;
            }

            .tabla-pedidos td{
                padding: 1em;
                text-align: center;
            }

            .tabla-pedidos input{
                width: 100%;
            }

            #NumPedido{
                display: none;
            }

            input{
                background: none;
                border: 2px solid #fff;
                border-radius: .3em;
            }

            .tabla-pedidos #buscar{
                margin: auto;
                width: 90%;
                margin:  10px;
                font-size: 1.2em;
                color: white;
                background-color: #44A59B;
                text-decoration: none;
                border: 2px solid black;
                border-radius: 10px;
                padding: 10px;
            }

            .tabla-pedidos #buscar:hover{
                background-color: #005950;
                transform: scale(1.1);
                cursor:pointer;
            }


            h1{
                text-align: center;
                font-size: 2em;
                margin:  1em;
            }

             .contenedor-titulo{
                width: 70%;
                padding-bottom: .5em;
            }

            .contenedor-titulo h2{
                font-size: 2em;
                background-color: darkslateblue;
                text-align: center;
            }

             @media (max-width: 990px){

                .contenedor-pasarela{
                    width: 80%;
                }

                .bandeja_pedidos{
                    height: 75%;
                }

                .tabla-pedidos{
                    width: 80%;
                }

                .tabla-pedidos td{
                    margin: auto;
                    display: block;
                }
            }

            @media (max-width: 400px){

                form{
                    margin: 0;
                }

                .bandeja_pedidos{
                    height: 75%;
                }

                .tabla-pedidos td{
                    padding: 0;
                    padding-bottom: 1em;
                }

                h1{
                    font-size: 1.5em;
                }
            }

             @media (max-width: 300px){
                 .bandeja_pedidos{
                    width: 100%;
                }

                .tabla-pedidos{
                    width: 20%;
                }

                .tabla-pedidos input{
                    width: 70%;
                }
             }

		</style>
	</main>

	 <!-- CUSTOM JS -->
      <!-- SCROLL REVEAL -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script type='text/javascript'>
       document.querySelector('.menu-btn').addEventListener('click', () =>{
       document.querySelector('.nav-menu').classList.toggle('show');
        });
       ScrollReveal().reveal('.contenedor-pasarela', {delay: 100});
    </script> 

</body>
</html>