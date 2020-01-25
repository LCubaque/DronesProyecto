<?php

/*Va a cambiar los campos seleccionados, en caso de solo editar; y va a cambiar el estado de 'Cancelado' a verdadero en caso de querer borrar la reserva.*/

require_once('../bdu.php');

if (!empty($_POST['delete']) && !empty($_POST['id'])){

	$id = $_POST['id'];

	$sql = "UPDATE T_RESERVAS_ENCAB SET nCancelado = '1' WHERE nIdReserva = $id;";
	$query = $bdu->prepare($sql);
	if ($query == false) {
        print_r($bdu->errorInfo());
        die ('Error prepare');
	}
	$res = $query->execute();
	if ($res == false) {
        print_r($query->errorInfo());
        die ('Error execute');
	}

} elseif(!empty($_POST['name']) && !empty($_POST['priority']) && !empty($_POST['start']) && !empty($_POST['id']) && !empty($_POST['meetplace']) && empty($_POST['delete'])){

	$id = $_POST['id'];
	$name = $_POST['name'];
    $start = $_POST['start'];
    $calc = strtotime('+20 minutes', strtotime($start));
    $end = date('Y-m-d H:i:s', $calc);
    $meetplace = $_POST['meetplace'];
	$priority = $_POST['priority'];

	$sql = "UPDATE T_RESERVAS_ENCAB SET cNomVisitante = '$name', dFechaInicio = '$start', dFechaFin = '$end', cLugarEncuentro = '$meetplace', cColor = '$priority' WHERE nIdReserva = $id;";

	$query = $bdu->prepare( $sql );
	if ($query == false) {
        print_r($bdu->errorInfo());
        die ('Error prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
        print_r($query->errorInfo());
        die ('Error execute');
	}
}

$bdu = NULL;

header('Location: '.$_SERVER['HTTP_REFERER']);

?>
