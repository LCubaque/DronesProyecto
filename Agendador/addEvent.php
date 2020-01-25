<?php

/*Para agregar un evento, el sistema va a ver si hay reservas para la misma hora, y si la cantidad de drones disponibles es la adecuada para ello.
Va a revisar los campos obligatorios, y va a dar un tiempo de 20 minutos para cada reserva*/

// Conexión a la base de datos
require_once('../bdu.php');

if (!empty($_POST['name']) && !empty($_POST['lastName']) && !empty($_POST['meetplace']) && !empty($_POST['personVisit']) && !empty($_POST['start']) && !empty($_POST['idTercero'])){
    
	$name = $_POST['name'];
	$lastName = $_POST['lastName'];
	$nameLastName = "{$name} {$lastName}";
	$start = $_POST['start'];
    
    $calc = strtotime('+20 minutes', strtotime($start));
    $end = date('Y-m-d H:i:s', $calc);
    if(!empty($_POST['priority'])) {
        $priority = $_POST['priority'];
    } else {
        $priority = '#0071c5';
    }
    $personVisit = $_POST['personVisit'];	
    $Dron = 1;
    $Estado = 0;
    if(isset($_POST['company'])) {
        $company = $_POST['company'];
    }
	$meetplace = $_POST['meetplace'];
    $IdTercero = $_POST['idTercero'];
    
    $sql = "SELECT nIdReserva FROM T_RESERVAS_ENCAB WHERE dFechaInicio <= '$start' AND dFechaFin >= '$start';";
    $query = $bdu->prepare($sql);
	if ($query == false) {
        print_r($bdu->errorInfo());
        die('Error prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
        print_r($query->errorInfo());
        die('Error execute');
	} else {
        $nResultados = $query->rowCount();
    }
    
    $query = NULL;
    
	$sql2 = "SELECT * FROM M_DRONES";
    $query2 = $bdu->prepare($sql2);
	if ($query2 == false) {
        print_r($bdu->errorInfo());
        die ('Error prepare');
	}
	$sth2 = $query2->execute();
	if ($sth2 == false) {
        print_r($query2->errorInfo());
        die ('Error execute');
	} else {
        $nCantDrones = $query2->rowCount();
    }
    
    $query2 = NULL;
    
    if($nResultados < $nCantDrones) {
        $sql3 = "INSERT INTO T_RESERVAS_ENCAB(cNomVisitante, dFechaInicio, dFechaFin, cColor, cNumIdVisitado, nIdDron, nTipoEstado, cEmpresa, cLugarEncuentro, nIdTercero) values('$nameLastName', '$start', '$end', '$priority', '$personVisit', '$Dron', '$Estado', '$company', '$meetplace', '$IdTercero');";
        $query3 = $bdu->prepare($sql3);
        if ($query3 == false) {
            print_r($bdu->errorInfo());
            die('Error prepare');
        }
        $sth3 = $query3->execute();
        if ($sth3 == false) {
            print_r($query3->errorInfo());
            die('Error execute');
        }
        $query3 = NULL;
    }
}

$bdu = NULL;

header('Location: '.$_SERVER['HTTP_REFERER']);

?>
