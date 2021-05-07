<?php
include_once("modelo\aProd.php");
session_start();
$lugar = $_REQUEST["lugar"];
$carrito= $_SESSION["carrito"];
$total= $_SESSION["total"];
$cliente= $_SESSION["cliente"];

$d= new aProd();
try{
			$d->crearVenta($carrito,$total,$cliente,$lugar);
    header("location: buscar.php?c=1");
            //header("location: ListaProd2.php?m=3");
		}catch(Exception $e){
			//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
             header("location: ListaProd2.php?m=3");
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error en base de datos, comunicarse con el administrador";
		}

session_unset($carrito);
session_unset($total);
session_unset($cliente);

//header("location: buscar.php?c=1");



?>