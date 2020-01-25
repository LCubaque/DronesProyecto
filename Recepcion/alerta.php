<?php

/*Le va a cargar la información necesaria para enviar la alerta al practicante: persona y lugar de encuentro para que él pueda llevarlo al lugar requerido*/

require('../pusher-http-php-master/lib/Pusher.php');

$meetplace = $_POST['meetplace'];
$estado = $_POST['estado'];

if($estado == 'PENDIENTE') {
    $mensaje = "Llegó " .$_POST['name']. ".\nLugar de encuentro: " .$meetplace;
    $id = $_POST['id'];
    $options = array(
        'encrypted' => true
    );

    $pusher = new Pusher(
        '32443c496a19a837afc1',
        '17beb2804d5d52a2c6f4',
        '322015',
    $options);

    $pusher->trigger('my-channel', 'my-event', array('mensaje' => $mensaje, 'id' => $id));

    header('Location: '.$_SERVER['HTTP_REFERER']);

} else {
    $confirmacion = 'Ya se ha enviado el dron';
    $options = array(
        'encrypted' => true
    );

    $pusher = new Pusher(
        '32443c496a19a837afc1',
        '17beb2804d5d52a2c6f4',
        '322015',
    $options);

    $pusher->trigger('my-channel', 'my-event3', array('confirmacion' => $confirmacion));
    header('Location: '.$_SERVER['HTTP_REFERER'].'?aviso=1');
}

?>