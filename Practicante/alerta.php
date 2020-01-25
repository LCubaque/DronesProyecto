<?php

/*Va a cambiar el estado del dron en el momento que Recepción le envié la alerta y él (o ella) la acepte.*/

require('../pusher-http-php-master/lib/Pusher.php');

if($_POST['cambio'] == 1) {
    $confirmado = 'El estado del dron ha cambiado';
    $change = 1;
} else if($_POST['cambio'] == 0) {
    $confirmado = 'No se ha enviado el dron, intente de nuevo';
    $change = 0;
}

$options = array(
    'encrypted' => true
);

$pusher = new Pusher(
    '32443c496a19a837afc1',
    '17beb2804d5d52a2c6f4',
    '322015',
$options);

$pusher->trigger('my-channel', 'my-event2', array('confirmacion' => $confirmado, 'cambioExitoso' => $change));
    
header('Location: '.$_SERVER['HTTP_REFERER']);

?>