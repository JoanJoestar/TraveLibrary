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
    <!-- LIBRERIA GLIDER-JS CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <title>TraveLibrary - FAVORITOS & TEMATICAS</title>
</head>
<body>
     <?php
        // PARA VER LOS CAMBIOS COLOCO LA DIRECCION EN EL NAVEGADOR: [http://localhost/APP__TRAVELIBRARY/favoritos-tematicas__librosUsuario.php]

        //Revisamos que el usuario haya iniciado SESIÓN
        require("Validar-EntradaLogin.php");
    ?>    
    
    <div class="menu-btn">
        <i class="fas fa-bars"></i>
    </div> 

    <div class="Div-pantalla-fondo">
        <div id="contenedor-temas">
            <nav class="nav-main">
                <ul class="nav-menu">
                     <li><a href="Cerrar-Sesion.php">Cerrar Sesión</a></li>
                    <li><a href="menu-principalUsuario.php">Menú principal</a></li>
                </ul>
		  </nav>
        <form method="post" action="DatosResultados.php" name="busqueda" id="busqueda">
            <div class="barra-busqueda">
                <input type="text" name="search" id="search" placeholder="Busqueda de Libros" class="src" autocomplete="off">
                <button type="submit" form="busqueda"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <div class="img-temas">
            <div class="miniaturas-temas"><a href="tema_terror.php"><img src="img/imagen-terror.png"></a></div>
            <div class="miniaturas-temas"><a href="tema_ciencia.php"><img src="img/imagen-ciencia.png"></a></div>
            <div class="miniaturas-temas"><a href="tema_drama.php"><img src="img/imagen-drama.png"></a></div>
            <div class="miniaturas-temas"><a href="tema_historia.php"><img src="img/imagen-historia.png"></a></div>
        </div>    
        </div>
    </div>
    <!-- CUSTOM CSS -->
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

        /* FONDO DE PANTALLA */
        .Div-pantalla-fondo{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: url('img/fondo1.png') center/cover;
            height: 100vh;
        }
        /* BARRA DE BUSQUEDA */
        .barra-busqueda{
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        input.src{
            padding:  9px 10px 9px 32px;
            outline: none;
            font-size: 18px;
            border-radius: 15px;
            color: #444;
            border: 3px solid #a50559;
            width: 70px;
            transition: all 0.5s;
        }

        i{
            position: absolute;
            left: 10px;
            top: 15px;
            color: #000;
        }

        button{
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .barra-busqueda:hover > input{
            width: 220px;
            background-color: #fff;
            border-color:  #8c10b3;
            box-shadow: 0 0 5px #6dcff680;
        }

        .barra-busqueda:hover > i{
            left: 10px;
            background: none;
        }
        /*CONTENEDOR DE LOS TEMAS*/
        #contenedor-temas{
            width: 80%;
            height: 80%;
            background-color: slateblue;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            -webkit-box-shadow: 0px 0px 0px 5px #A0A0A0, inset 0px 10px 27px -8px #141414, inset 0px -10px 27px -8px #A31925, -10px 2px 7px 5px rgba(0,0,0,0); 
            box-shadow: 0px 0px 0px 5px #A0A0A0, inset 0px 10px 27px -8px #141414, inset 0px -10px 27px -8px #A31925, -10px 2px 7px 5px rgba(0,0,0,0);
        }
        #contenedor-temas img{
            width: 8em;
            height: 8em;
        }
        .img-temas{
            width: 90%;
            height: 70%;
            margin: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            flex-wrap: wrap;
            overflow: auto;
        }
        .miniaturas-temas{
            background-color: #D7BDE2;
            width: 10em;
            height: 10em;
            margin: 1em;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            overflow: auto;
        }
        /* BOTON-MENU */
        .menu-btn{
            position: absolute;
            cursor: pointer;
            top: 12%;
            right: 20%;
        }

        .menu-btn i{
            color: #FFF;
            font-size: 2rem;
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
            z-index: 2;
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
        @media (max-width: 670px) {

            #contenedor-temas{
                width: 85%;
            }
            .img-temas{
                top: 10%;
            }
            .menu-btn{
                top: 10%;
            }
            .menu-btn i{
                font-size: 1.5rem;
            }
            .barra-busqueda{
               top: 15%;
            }
            .nav-main ul.nav-menu{
                width: 60vw;
            }
        }

        @media (max-width: 400px){
             #contenedor-temas{
                width: 85%;
            }
            .nav-main ul.nav-menu{
                width: 60vw;
            }
            .menu-btn{
                top: 10%;
            }
            .menu-btn i{
                font-size: 1.5rem;
            }
            .img-temas{
                top: 10%;
            }
        } 
    </style>

    <!-- CUSTOM JS -->
    <!-- SCROLL REVEAL -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script type='text/javascript'>
        // BOTON MENÚ
        document.querySelector('.menu-btn').addEventListener('click', () =>{
        document.querySelector('.nav-menu').classList.toggle('show');
    });
        ScrollReveal().reveal('#contenedor-temas', {delay: 100});
    </script>
</body>
</html>