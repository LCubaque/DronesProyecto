<?php

/*Cierra la sesión y vuleve al inicio*/

session_start();

if($_SESSION['TipoPerfil']) {
    session_destroy();
    header('Location: index.php');
}

else {
    header('Location: index.php');
}

?>