<?php

/*Conexión a la base de datos implementada.*/

try
{
	$bdu = new PDO('mysql:host=localhost;dbname=DRONES_EAN;charset=utf8', 'root', '');
    $bdu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    die('Error : '.$e->getMessage());
}

?>