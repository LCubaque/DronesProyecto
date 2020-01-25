<!DOCTYPE html>

<!--La página principal, va a permitir el ingreso a la plataforma.-->
<?php

error_reporting(0);

session_start();

if($_SESSION['TipoPerfil']) {
    if($_SESSION['TipoPerfil'] == 4) {
        header('Location: Practicante/index.php');
    }
    elseif($_SESSION['TipoPerfil'] == 1) {
        header('Location: Manager/index.php');
    }
    elseif($_SESSION['TipoPerfil'] == 2) {
        header('Location: Agendador/index.php');
    }
    elseif($_SESSION['TipoPerfil'] == 3) {
        header('Location: Recepcion/index.php');
    }
}

?>

<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="author" content="SCRUM EAN">
        <meta name="description" content="">

        <title>DRONE EAN</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- FullCalendar -->
        <link href='css/fullcalendar.css' rel='stylesheet' />

        <!-- Custom CSS -->
        <link href='css/style.css' rel='stylesheet' />
        <link href='css/main.css' rel='stylesheet' />


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
    
    <!-- Page Content -->

        <?php 
            if($_GET['error'] == 1) {
                echo "<div class='error'><p>Datos inválidos</p></div>";
            }
        ?>
                                       
        <div class="Container Login">
            <div class="Contain">
                <div class="Wrap LogForm">
                    <h1 class="TitleLogin">Ingreso</h1>
                    <form action="validarusuarios.php" class="Ingreso" method="POST">
                        <div class="Box">
                            <input type="text" name="Usu" class="Usu" id="Usu" placeholder="Usuario">
                        </div>
                        <div class="Box">
                            <input type="password" name="Pass" class="Pass" id="Pass" placeholder="Contraseña">
                        </div>
                        <div class="LoginButton">
                            <button type="submit">Ingresar</button>
                        </div>
                        <div class="HaOlvidadoClave">
                            <a href="#">¿Ha olvidado la contraseña?</a><!--Enviar correo-->
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--JQuery-->
        <script src="js/jquery-2.0.0.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>