<?php

/*Es el usuario pensado para la implementación en la Universidad. Tendrá todos los permisos, y otras funciones.*/

session_start();

if($_SESSION['TipoPerfil'] && $_SESSION['IdTercero'] && $_SESSION['NomPersona']) {
    $Id_Tercero = intval($_SESSION['IdTercero']);
    $NombrePersona = $_SESSION['NomPersona'];
    if(!($_SESSION['TipoPerfil'] == 1)) {
        if($_SESSION['TipoPerfil'] == 2) {
            header('Location: ../Agendador/index.php');
        }
        elseif($_SESSION['TipoPerfil'] == 3) {
            header('Location: ../Recepcion/index.php');
        }
        elseif($_SESSION['TipoPerfil'] == 4) {
            header('Location: ../Practicante/index.php');
        }
    }
}

else {
    header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Próximamente</title>
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">	
	    <!-- FullCalendar -->
	    <link href='../css/fullcalendar.css' rel='stylesheet' />
        <!--Estilos personales-->
        <link rel="stylesheet" href="../css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-fixed-top Green1" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <div class="LogoUEAN">
                            <a href="http://universidadean.edu.co">
                                <img src="../Images/EAN-blanco.png" alt="Logo EAN">
                            </a>
                        </div>
                        <div class="MenuGral">
                            <ul class="MenuUl">
                                <li>
                                    <p>Hola, <?php echo ' '.$NombrePersona; ?></p>
                                </li>
                                <li>
                                    <a href="../cerrarsesion.php">Cerrar sesión</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="Green2">

                </div>
            </nav>
            <div class="LogosDroneEAN">
                <div class="LogoSmart">
                    <img src="../Images/PeticionesCliente/Logo_2.png" alt="Logo Smart EAN">
                </div>
                <div class="LogoDrone2">
                    <img src="../Images/PeticionesCliente/Logo_Drone2.png" alt="Logo Drone EAN">
                </div>
            </div>
        </div>
    </body>
</html>