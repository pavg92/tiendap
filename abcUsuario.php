<?php
/*
Archivo:  abcPersHosp.php
Objetivo: edición sobre Personal Hospitalario
Autor:
*/
include_once("modelo\Personal.php");
session_start();

$sErr=""; $sOpe = ""; $sCve = ""; $sNomBoton ="Borrar";
$oPers=new Personal();
$bCampoEditable = false; $bLlaveEditable=false;

$oPers = new Personal();
	/*Verificar que haya sesión*/
	if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
		/*Verificar datos de captura*/
		if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
			isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
			$sOpe = $_POST["txtOpe"];
			$sCve = $_POST["txtClave"];
			if ($sOpe != 'a'){
				$oPers->setIdPersonal($sCve);
				try{
					if (!$oPers->buscar()){
						$sError = "Personal Hospitalario no existe";
					}
				}catch(Exception $e){
					error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
					$sErr = "Error en base de datos, comunicarse con el administrador";
				}
			}
			if ($sOpe == 'a'){
				$bCampoEditable = true;
				$bLlaveEditable = true;
				$sNomBoton ="Agregar";
			}
			else if ($sOpe == 'm'){
				$bCampoEditable = true; //la llave no es editable por omisión
				$sNomBoton ="Modificar";
			}
			//Si fue borrado, nada es editable y es el valor por omisión
		}
		else{
			$sErr = "Faltan datos";
		}
	}
	else
		$sErr = "Falta establecer el login";

	if ($sErr == ""){
		include_once("cabecera.php");

	}
	else{
		header("Location: error.php?sError=".$sErr);
		exit();
	}
?>

<section>
    <br><br>
		<div class="container" style="width: 60%">
			<h2> Usuarios </h2>
			<form name="abcPH" action="resABC.php" method="post">
				<input type="hidden" name="txtOpe"   value="<?php echo $sOpe;?>">
				<input type="hidden" name="txtClave"  value="<?php echo $sCve;?>"/>
				Nombre
				<input type="text" name="txtNombre"  class="form-control" required="true"
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oPers->getNombre();?>"/>
				
				Correo Electronico<br>
				<input type="email" name="txtApePat"  class="form-control" required="true"
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oPers->getCorreo();?>"/>
				
				
				Domicilio
				<input type="text" name="txtApeMat"  class="form-control" required="true"
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oPers->getDomicilio();?>"/>
				
				<br>
				<input type ="submit" class="btn btn-cyan" value="<?php echo $sNomBoton;?>"
				onClick="return evalua(txtNombre, txtApePat);"/>
			
				<input type="submit" class="btn btn-danger" name="Submit" value="Cancelar"
				 onClick="abcPH.action='tabUsuarios.php';">
			</form>
		</div>
</section>
<?php
include_once("pie.html");
?>
