<?php
include_once("modelo\aProd.php");


$oPers = new aProd();
$arrPers=null;
$index= $_GET["in"]-1;
$id= $_GET["id"];
$cant= $_GET["can"];
session_start();

if(isset($_SESSION["carrito"])){
    $carrito = $_SESSION["carrito"];
    unset($carrito[$index]);
    $carrito= array_values($carrito);
    
    $_SESSION["carrito"]= $carrito;
      try{
			$oPers->actStock2($id,$cant);
            //header("location: ListaProd2.php?m=3");
		}catch(Exception $e){
			//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
             header("location: ListaProd2.php?m=3");
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error en base de datos, comunicarse con el administrador";
		}
    if(count($carrito)==0){
        unset($_SESSION["carrito"]);
    }
}

header("location: GuardarSelec.php")

?>