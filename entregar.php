<?php

require_once "modelo/aProd.php";
$idVenta = $_GET["id"];
$d = new aProd();

try{
    $d->entrega($idVenta);
    header("location: estadisticas.php?c=1");
            //header("location: ListaProd2.php?m=3");
		}catch(Exception $e){
			//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
             header("location: estadisticas.php?m=3");
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error en base de datos, comunicarse con el administrador";
		}
?>