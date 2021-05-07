
<?php
/*************************************************************/
/* Archivo:  inicio.php
 * Objetivo: página de sesión iniciada
 * Autor:  BAOZ
 *************************************************************/
include_once("modelo\Usuario.php");
session_start();
$sErr = "";
$sNom="";
$sCorreo="";
$sDomicilio="";
$sTipo="";
$oUsu=new Usuario();

	if (isset($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
		$sNom = $oUsu->getPers()->getNombre();
        $sCorreo = $oUsu->getPers()->getCorreo();
        $sDomicilio = $oUsu->getPers()->getDomicilio();
		$sTipo = $_SESSION["tipo"];
	}
	else
		$sErr = "Debe estar firmado";

	if ($sErr == ""){
		include_once("cabecera.php");

	}
	else{
		header("Location: error.php?sErr=".$sErr);
		exit();
	}
 ?>

 <section>

			<h1>Bienvenido </h1>
			<h2>Eres tipo <?php echo $sTipo;?></h2>
</section>
<?php
//include_once("pie.html");
?>


<br>
<?php include_once("pie.html");?>
