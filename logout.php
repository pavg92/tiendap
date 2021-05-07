<?php
/*
Archivo:  logout.php
Objetivo: termina la sesión
Autor: BAOZ   
*/
session_start();
$sErr="";
$sCve="";
$sNom="";
	/*Verificar que hayan llegado los datos*/
	if (isset($_SESSION["usu"])){
		//session_destroy();
        unset($_SESSION["usu"]);
	}
	else
		$sErr = "Falta establecer el login";
	
	if ($sErr == "")
		header("Location: index.php");
	else
		header("Location: error.php?sError=".$sErr);
	exit();
?>