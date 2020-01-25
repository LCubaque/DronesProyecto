<?php

/*Cargará el calendario con las reservas realizadas solo por esa persona. Podra agendar, cancelar, y editar la reserva.*/

session_start();

if($_SESSION['TipoPerfil'] && $_SESSION['IdTercero'] && $_SESSION['NomPersona']) {
    $Id_Tercero = intval($_SESSION['IdTercero']);
    $NombrePersona = $_SESSION['NomPersona'];
    if(!($_SESSION['TipoPerfil'] == 2)) {
        if($_SESSION['TipoPerfil'] == 1) {
            header('Location: ../Manager/index.php');
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

require_once('../bdu.php');

$sql = "SELECT * FROM T_RESERVAS_ENCAB WHERE nIdTercero = '$Id_Tercero' AND nCancelado = '0';";

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
		
		    <!-- Modal -->
		    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		        <div class="modal-dialog" role="document">
                    <div class="modal-content">
			            <form class="form-horizontal" method="POST" action="addEvent.php">
			                 <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    				                <span aria-hidden="true">&times;</span>
				                </button>
				                <h4 class="modal-title" id="myModalLabel">Reservar</h4>
				            </div>
				            <div class="modal-body">
				                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Nombres</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
				                    </div>
				                </div>
				                <div class="form-group">
                                    <label for="lastName" class="col-sm-2 control-label">Apellidos</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Apellidos">
				                    </div>
				                </div>
				                <div class="form-group">
                                    <label for="company" class="col-sm-2 control-label">Empresa</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="company" class="form-control" id="company" placeholder="Empresa o institución">
				                    </div>
				                </div>
				                <div class="form-group">
                                    <label for="meetplace" class="col-sm-2 control-label">Lugar encuentro</label>			                    
				                    <div class="col-sm-10">
				                        <input type="text" name="meetplace" class="form-control" id="meetplace" placeholder="Lugar de encuentro">
				                    </div>
				                </div>
				                <div class="form-group">
                                    <label class="col-sm-2 control-label">Persona a visitar</label>
				                    <div class="col-sm-10">
				                        <select name="personVisit" class="form-control" id="visita">
				                            <option value="">Persona a visitar</option>
				                            <option value="12345678910">Rubén Gomez</option>
				                            <option value="31245678910">Alix Rojas</option>
				                            <option value="21345678910">Luz Marina Sánchez</option>
				                        </select>
				                    </div>
				                </div>
				                <div class="form-group">
                                    <label class="col-sm-2 control-label">Prioridad</label>
				                    <div class="col-sm-10">
				                        <select name="priority" class="form-control" id="priority">
				                            <option value="">Elegir</option>
				                            <option style="color:#FF0000;" value="#FF0000">URGENTE</option>
				                            <option style="color:#0071c5;" value="#0071c5">NORMAL</option>
				                        </select>
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label for="start" class="col-sm-2 control-label">Hora inicio</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="start" class="form-control" id="start">
				                    </div>
				                </div>
				                <input type="hidden" name="idTercero" class="form-control" id="idTercero">
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="reset" class="btn btn-default">Limpiar campos</button>
				                <button type="submit" class="btn btn-primary">Reservar drone</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		
		    <!-- Modal -->
		    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		        <div class="modal-dialog" role="document">
		            <div class="modal-content">
		                <form class="form-horizontal" method="POST" action="editEventTitle.php">
		                    <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Editar reserva</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Nombres</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Título">
                                    </div>
                                </div>
                                <div class="form-group">
				                    <label for="start" class="col-sm-2 control-label">Hora inicio</label>
				                    <div class="col-sm-10">
				                        <input type="text" name="start" class="form-control" id="start">
				                    </div>
				                </div>
                                <div class="form-group">
                                    <label for="meetplace" class="col-sm-2 control-label">Lugar encuentro</label>			                    
				                    <div class="col-sm-10">
				                        <input type="text" name="meetplace" class="form-control" id="meetplace" placeholder="Lugar de encuentro">
				                    </div>
				                </div>
                                <div class="form-group">
                                    <label for="priority" class="col-sm-2 control-label">Prioridad</label>
                                    <div class="col-sm-10">
                                        <select name="priority" class="form-control" id="priority">
                                            <option value="">ELEGIR</option>
                                            <option style="color:#FF0000;" value="#FF0000">URGENTE</option>
				                            <option style="color:#0071c5;" value="#0071c5">NORMAL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <input type="checkbox" name="delete" id="check-delete">
                                            <label class="text-danger" for="check-delete">Borrar reserva</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" class="form-control" id="id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="Background"></div>

        <!-- jQuery Version 2.0.0 -->
        <script src="../js/jquery-2.0.0.min.js"></script>    
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- FullCalendar -->
	    <script src='../js/moment.min.js'></script>
	    <script src='../js/fullcalendar.min.js'></script>
	
	    <script>
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
                    if((moment(start).format('YYYY-MM-DD')) >= moment($.now()).format('YYYY-MM-DD')) {
                        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                        $('#ModalAdd #idTercero').val('<?php echo $Id_Tercero; ?>');
                        $('#ModalAdd').modal('show');
                    }
                },
                eventRender: function(event, element) {
                    element.on('click', function() {
                        if((moment(event.start).format('YYYY-MM-DD')) >= moment($.now()).format('YYYY-MM-DD')) {
                            $('#ModalEdit #id').val(event.id);
                            $('#ModalEdit #name').val(event.title);
                            $('#ModalEdit #start').val(moment(event.start).format('YYYY-MM-DD HH:mm:ss'));
                            $('#ModalEdit #meetplace').val(event.meetplace);
                            $('#ModalEdit #priority').val(event.color);
                            $('#ModalEdit').modal('show');
                        }
                    });
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
                        color: '<?php echo $event['cColor']; ?>',
                        meetplace: '<?php echo $event['cLugarEncuentro']; ?>'
                    },
                <?php endforeach; ?>
                ]
            });
        });
        </script>
    </body>
</html>
