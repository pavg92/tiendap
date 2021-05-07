<?php
/*
Archivo:  login.php
Objetivo: verifica clave y contraseña contra repositorio a través de clases
Autor:   BAOZ
*/
include_once("modelo\Usuario.php");
session_start();
$sErr="";
$sCorreo="";
$sNom="";
$sPwd="";
$oUsu = new Usuario();
	/*Verificar que hayan llegado los datos*/
	if (isset($_POST["txtCve"]) && !empty($_POST["txtCve"]) &&
		isset($_POST["txtPwd"]) && !empty($_POST["txtPwd"])){
		$sCorreo = $_POST["txtCve"];
		$sPwd = $_POST["txtPwd"];
		$oUsu->setCorreo($sCorreo);
		$oUsu->setPwd($sPwd);
		try{
			if ( $oUsu->buscarCvePwd() ){
				$sNom = $oUsu->getPers()->getNombre();
				$_SESSION["usu"] = $oUsu;
				if ($oUsu->getPers()->getTipo()== Personal::TIPO_ADM)
					$_SESSION["tipo"] = "Administrador";
				else
						$_SESSION["tipo"] = "Usuario";
			}
			else{
				$sErr = "Usuario desconocido";
			}
		}catch(Exception $e){
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error al acceder a la base de datos";
		}
	}
	else
		$sErr = "Faltan datos";

	if ($sErr == "")
        if($_SESSION["tipo"]=="Administrador")
		  header("Location: PerfilAdm.php");
        else
            header("Location: buscar.php");
	else
		header("Location: error.php?sError=".$sErr);
?>
