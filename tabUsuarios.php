<?php
/*
Archivo:  tabpersonal.php
Objetivo: consulta general sobre personal hospitalario y acceso a operaciones detalladas
Autor:   BAOZ
*/
include_once("modelo\Usuario.php");
include_once("modelo\Personal.php");
session_start();
$sErr="";
$sNom="";
$arrPers=null;
$oUsu = new Usuario();
$oPers = new Personal();
	/*Verificar que exista sesión*/
	if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
		$sNom = $oUsu->getPers()->getNombre();
		try{
			$arrPers = $oPers->buscarTodos();
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
<link rel="stylesheet" type="text/css" href="css/estilo.css">

<section>
<br><br>
<div class="container">

	<br>
	<left> <h1> Usuarios </h1> </left>
    <hr/>
			
			<form name="formTablaGral" method="post" action="abcUsuario.php">
				<input type="hidden" name="txtClave">
				<input type="hidden" name="txtOpe">
				<table id="Usuarios" align="center">
					<tr>
						<th>Clave</th>
						<th>Nombre</th>
						<th>Correo</th>
                        <th>Domicilio</th>
                        <th>Operaci&oacute;n</th>

					</tr>
					<?php
						if ($arrPers!=null){
							foreach($arrPers as $oPers){
                               
					?>
					<tr>
						<td class="llave"><?php echo $oPers->getIdPersonal(); ?>
                        <?php echo ($oPers->getIdPersonal()==1?'admin':' Usu');?></td>
						<td><?php echo $oPers->getNombre(); ?></td>
                        <td><?php echo $oPers->getCorreo(); ?></td>
                        <td><?php echo $oPers->getDomicilio(); ?></td>
						<td>
							<input type="submit" class="btn btn-elegant" name="Submit" value="Modificar" onClick="txtClave.value=<?php echo $oPers->getIdPersonal(); ?>; txtOpe.value='m'">
							<input type="submit" class="btn btn-elegant"  name="Submit" value="Borrar" onClick="txtClave.value=<?php echo $oPers->getIdPersonal(); ?>; txtOpe.value='b'">
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

			</form>
		</div>
</section>
<?php
include_once("pie.html");
?>
