<?php

/*Vista del practicante: Se le cargarán todas las reservas, pero no podrá afectar a ninguna de ellas. Solo esperará las alertas de cuando el visitante llegue.*/

session_start();

if($_SESSION['TipoPerfil'] && $_SESSION['NomPersona']) {
    $NombrePersona = $_SESSION['NomPersona'];
    if(!($_SESSION['TipoPerfil'] == 4)) {
        if($_SESSION['TipoPerfil'] == 1) {
            header('Location: ../Manager/index.php');
        }
        elseif($_SESSION['TipoPerfil'] == 2) {
            header('Location: ../Agendador/index.php');
        }
        elseif($_SESSION['TipoPerfil'] == 3) {
            header('Location: ../Recepcion/index.php');
        }
    }
}

else {
    header('Location: ../index.php');
}

require_once('../bdu.php');

$sql = "SELECT * FROM T_RESERVAS_ENCAB WHERE nCancelado = '0';";

$req = $bdu->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>DRONE EAN</title>
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
    <body class="backcalendar">                    
        <!-- Page Content -->
        <div class="container">
            <!-- Navigation -->
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
            <div class="containercalendar">
                <div class="row">
                    <div class="col-lg-12 text-center colorcalendario">
                        <!--Título calendario más logo drone-->
                        <div class="Titulo">
                            <h1>CALENDARIO DRONE</h1>
                        </div>
                        <!--<p class="lead"></p>-->
                        <!--Calendario dinámico-->
                        <div id="calendar" class="col-centered">
                        </div>
                    </div>
                    <footer>
                        <div class="Foot">
                            <p>&copy; 2017 Universidad EAN</p>
                        </div>
                    </footer>
                </div>
            </div>
            <!--Fin container calendar-->
        </div>
        <div class="Background"></div>
        
        <!-- jQuery Version 2.0.0 -->
        <script src="../js/jquery-2.0.0.min.js"></script>    
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- FullCalendar -->
	    <script src='../js/moment.min.js'></script>
	    <script src='../js/fullcalendar.min.js'></script>
	
        <script src="../pusher-http-php-master/lib/pusher.min.js"></script>
        <script>
            $(function() {
                var pusher = new Pusher('32443c496a19a837afc1', {
                    encrypted: true
                });
                var channel = pusher.subscribe('my-channel');
                channel.bind('my-event', function(resp) {
                    if(confirm(resp.mensaje)) {
                        $.ajax({
                            url: '../cambiarEstado.php',
                            method: 'POST',
                            data: {cambioEstado: true, id: resp.id}
                        })
                        .done(function() {
                            $.ajax({
                                url: 'alerta.php',
                                method: 'POST',
                                data: {cambio: 1}
                            })
                            .done(function() {
                                alert('Se ha avisado a recepción');
                            });
                        })
                        .fail(function() {
                            alert('Error en la ejecución');
                        })
                        .always(function () {
                            console.log('Petición realizada');
                        });
                    } else {
                        $.ajax({
                            url: 'alerta.php',
                            method: 'POST',
                            data: {cambio: 0}
                        })
                        .done(function() {
                            alert('Se ha avisado a recepción');
                        });
                    }
                });
            });
        </script>
        
        <script>
        /*Cargar el calendario*/
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: $.now(),
                minTime: "08:00:00",
                maxTime: "18:30:00",
                navLinks: true, // can clic day/week names to navigate views
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                select: function(start, end) {
                    /*No debe hacer nada*/
                },
                eventRender: function(event, element) {
                    /*No debe hacer nada*/
                },
                events: [
                <?php foreach($events as $event): 

                    $start = explode(" ", $event['dFechaInicio']);
                    $end = explode(" ", $event['dFechaFin']);
                    if($start[1] == '00:00:00'){
                        $start = $start[0];
                    }else{
                        $start = $event['dFechaInicio'];
                    }
                    if($end[1] == '00:00:00'){
                        $end = $end[0];
                    }else{
                        $end = $event['dFechaFin'];
                    }
                ?>
                    {
                        id: '<?php echo $event['nIdReserva']; ?>',
                        title: '<?php echo $event['cNomVisitante']; ?>',
                        start: '<?php echo $start; ?>',
                        end: '<?php echo $end; ?>',
                        color: '<?php echo $event['cColor']; ?>'
                    },
                <?php endforeach; ?>
                ]
            });
        });
        </script>
    </body>
</html>
