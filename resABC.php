<?php
/*
Archivo:  resABC.php
Objetivo: ejecuta la afectación al personal y retorna a la pantalla de consulta general
Autor:  BAOZ  
*/
include_once("modelo\Personal.php");
session_start();

$sErr=""; $sOpe = ""; $sCve = "";
$oPers = new Personal();

	/*Verificar que exista la sesión*/
	if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
		/*Verifica datos de captura mínimos*/
		if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
			isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
			$sOpe = $_POST["txtOpe"];
			$sCve = $_POST["txtClave"];
			$oPers->setIdPersonal($sCve);
			
			if ($sOpe != "b"){
				$oPers->setNombre($_POST["txtNombre"]);
				$oPers->setCorreo($_POST["txtApePat"]);
				$oPers->setDomicilio($_POST["txtApeMat"]);
            }
			try{
				if ($sOpe == 'a')
					$nResultado = $oPers->insertar();
				else if ($sOpe == 'b')
					$nResultado = $oPers->borrar();
				else 
					$nResultado = $oPers->modificar();
				
				if ($nResultado != 1){
					$sError = "Error en bd";
				}
			}catch(Exception $e){
				//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
				error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
				$sErr = "Error en base de datos, comunicarse con el administrador";
			}
		}
		else{
			$sErr = "Faltan datos";
		}
	}
	else
		$sErr = "Falta establecer el login";
	
	if ($sErr == "")
		header("Location: tabUsuarios.php");
	else
		header("Location: error.php?sError=".$sErr);
	exit();
?>