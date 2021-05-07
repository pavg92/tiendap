<?php
/*
Archivo:  tabpersonal.php
Objetivo: consulta general sobre personal hospitalario y acceso a operaciones detalladas
Autor:   BAOZ
*/
include_once("modelo\bProd.php");
include_once("modelo\aProd.php");
session_start();
$sErr="";
$sNom="";
$arrPers=null;
$oUsu = new bProd();
$oPers = new aProd();
	/*Verificar que exista sesión*/
	if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
		//$oUsu = $_SESSION["usu"];
		//$sNom = $oUsu->getPersHosp()->getNombreP();
		try{
			$arrPers = $oPers->buscarTodosAdmin();
		}catch(Exception $e){
			//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error en base de datos, comunicarse con el administrador";
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

<section style="float: center">

<br><br>
<div class="container">

<br>
	<left> <h1> Productos </h1> </left>
    <hr/>	
  
			<form name="formTablaGral" method="post" action="abcProd.php">
                <input type="submit" class="btn btn-elegant" name="Submit" value="Crear Nuevo" onClick="txtClave.value='-1';txtOpe.value='a'">
                <br>
				<input type="hidden" name="txtClave">
				<input type="hidden" name="txtOpe">
				<table  id="Usuarios" align="center">
					<tr>
						<th style="text-align: center">Clave</th>
						<th style="text-align: center">Nombre</th>
						<th style="text-align: center">Departamento</th>
                        <th style="text-align: center">Descripcion</th>
                        <th style="text-align: center">Precio</th>
                        <th style="text-align: center">Stock</th>
                        <th style="text-align: center">Imagen</th>
                        <th style="text-align: center">Operaci&oacute;n</th>

					</tr>
					<?php
						if ($arrPers!=null){
							foreach($arrPers as $oPers){

					?>
					<tr>
						<td class="llave"><?php echo $oPers->getIdPersonal(); ?></td>
						<td><?php echo $oPers->getNombreP(); ?></td>
                        <td><?php echo $oPers->getDepar(); ?></td>
                        <td><?php echo $oPers->getDescrip(); ?></td>
                        <td><?php echo $oPers->getPrecio(); ?></td>
                        <td><?php echo $oPers->getStock(); ?></td>
                         <td><img src="<?php echo $oPers->getImagen(); ?>" height="50px" /></td>
						<td>
							<input type="submit"  class="btn btn-elegant" name="Submit" value="Modificar" onClick="txtClave.value=<?php echo $oPers->getIdPersonal(); ?>; txtOpe.value='m'">
							<input type="submit"  class="btn btn-elegant" name="Submit" value="Borrar" onClick="txtClave.value=<?php echo $oPers->getIdPersonal(); ?>; txtOpe.value='b'">
						</td>
					</tr>
					<?php

                            }//foreach
						}else{
					?>
					<tr>
						<td colspan="2">No hay datos</td>
					</tr>
					<?php
						}
					?>
				</table>
				<br><br>
				<input type="submit" class="btn btn-elegant" name="Submit" value="Crear Nuevo" onClick="txtClave.value='-1';txtOpe.value='a'">
                <br>
			</form>
		</div>


	</section>
<?php
include_once("pie.html");
?>
