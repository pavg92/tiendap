<?php
/*
Archivo:  login.php
Objetivo: verifica clave y contraseña contra repositorio a través de clases
Autor:   BAOZ
*/
include_once("modelo\bProd.php");
session_start();
$sErr="";
$sCve="";
//$sNom="";
//$sPwd="";
$oProd = new bProd();
	/*Verificar que hayan llegado los datos*/
	if (isset($_POST["txtCve"]) && !empty($_POST["txtCve"])){
		$sCve = $_POST["txtCve"];
		//$sPwd = $_POST["txtPwd"];
		$oProd->setClave($sCve);
		//$oUsu->setPwd($sPwd);
		try{
			if ( $oProd->buscarCvePwd() ){
				$sNom = $oProd->getPersHosp()->getNombreP();
				$_SESSION["usu1"] = $oProd;
				/*if ($oUsu->getPersHosp()->getTipo()== PersonalHospitalario1::TIPO_ADM)
					$_SESSION["tipo"] = "Administrador";
				else
						$_SESSION["tipo"] = "Usuario";*/
			}
			else{
				$sErr = "Producto no encontrado";
			}
		}catch(Exception $e){
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error al acceder a la base de datos";
		}
	}
	else
		$sErr = "Faltan datos";

	if ($sErr == "")
       header("Location: ListaProd.php");
	else
		header("Location: errorProd.php?sError=".$sErr);
?>