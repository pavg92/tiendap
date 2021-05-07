<?php
/*
Archivo:  abcPersHosp.php
Objetivo: edición sobre Personal Hospitalario
Autor:
*/
include_once("modelo\aProd.php");
session_start();

$sErr=""; $sOpe = ""; $sCve = ""; $sNomBoton ="Borrar";
$oPers=new aProd();
$bCampoEditable = false; $bLlaveEditable=false;

$oPers = new aProd();
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
        <center> <h2> Articulo </h2> </center>
		<br>
		<div class="container" style="width: 80%">
			<form name="abcPH" action="resABCP.php?m=opTabla.selectedIndex" method="post" enctype="multipart/form-data">
				<input type="hidden" name="txtOpe" class="form-control mb-4" value="<?php echo $sOpe;?>">
				<input type="hidden" name="txtClave" class="form-control mb-4" class="form-control mb-4" value="<?php echo $sCve;?>"/>
				<Strong> Nombre </Strong>
				<input type="text" name="txtNombre"   class="form-control" required="true"
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oPers->getNombreP();?>"/>
				<br>
				<Strong> Departamento </Strong>
				<input type="text" name="txtDepar"  class="form-control" required="true"
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oPers->getDepar();?>"/>

			    <br>
				
				<Strong> Descripcion </Strong>
				<input type="text" name="txtDescrip" class="form-control mb-4" required="true"
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oPers->getDescrip();?>"/>

				
                <Strong> Precio </Strong>
				<input type="text" name="txtPrecio" class="form-control mb-4" required="true"
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oPers->getPrecio();?>"/>
				
                <Strong style="color: red"> Stock </Strong>
				<input type="text" name="txtStock" class="form-control mb-4" required="true"
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oPers->getStock();?>"/>
				
               
                <Strong> Imagen </Strong>
				<input type="file"class="btn btn-blue-gray" name="file"  
                       
					value="<?php echo $oPers->getImagen();?>" />
				
        <br><br>
                <center>
                <input type="button" class="btn btn-danger" name="Submit" value="Cancelar"
				 onClick="location.href='tabProd.php';">
				<input type ="submit" class="btn btn-cyan" value="<?php echo $sNomBoton;?>"
				onClick="return evalua(txtNombre, txtDepar);"/>
				</center>
				
			</form>
		</div>
    </section>
<?php
include_once("pie.html");
?>
