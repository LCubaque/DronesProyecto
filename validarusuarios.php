<?php

/*Va a validar que el usuario exista; lo va a clasificar por perfil, y lo enviará a su correspondiente inicio.*/

require_once('bdu.php');

if(!empty($_POST['Usu']) && !empty($_POST['Pass'])) {
    $usuario = $_POST['Usu'];
    $clave = $_POST['Pass'];

    session_start();
    
    $sql = "SELECT cNumIdTercero, cNombre1, nIdTipoPerfil FROM M_TERCEROS WHERE cUsuario = '$usuario' AND cContrasena = '$clave' AND nTienePerfil = 1";
    
    $query = $bdu->prepare($sql);
	if ($query == false) {
        print_r($bdu->errorInfo());
        die('Error prepare');
	}
	else {
        if ($query->execute() == false) {
            print_r($query->errorInfo());
            die('Error execute');
        } else {            
            $nResultados = $query->rowCount();
            if($nResultados != 0){
                $cUsuario = $query->fetch();
                $cNumIdTercero = $cUsuario[0];
                $NomPersona = $cUsuario[1];
                $nIdTipoPerfil = $cUsuario[2];
                $_SESSION['IdTercero'] = $cNumIdTercero;
                $_SESSION['NomPersona'] = $NomPersona;
                $_SESSION['TipoPerfil'] = $nIdTipoPerfil;
                switch($nIdTipoPerfil) {
                    case 1:
                        header('Location: Manager/index.php');
                        break;
                    case 2:
                        header('Location: Agendador/index.php');
                        break;
                    case 3:
                        header('Location: Recepcion/index.php');
                        break;
                    case 4:
                        header('Location: Practicante/index.php');
                        break;
                }
            }
            else {
                header('Location: index.php?error=1');
            }
        }
    }
}

else {
    header('Location: index.php');
}

$query = NULL;
$bdu = NULL;

?>