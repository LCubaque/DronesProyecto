<?php

/*Cambiará el estado del dron cuando el practicante acepte la alerta.*/

require_once('bdu.php');

if(($_POST['cambioEstado'] == true) && !empty($_POST['id'])) {
    
    $id = $_POST['id'];
    
    $sql = "UPDATE T_RESERVAS_ENCAB SET nTipoEstado = '1' WHERE nIdReserva = $id;";
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
    
    $query = NULL;
}

$bdu = NULL;

?>