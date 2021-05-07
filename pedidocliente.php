<?php
include_once("modelo/Usuario.php");
session_start();
include_once("modelo/AccesoDatos.php");

include_once("cabecera.php");

$oAccesoDatos=new AccesoDatos();
$sErr = "";
$sNom="";
$sCorreo="";
$sId=0;
$sTipo="";
$sQuery="";
$arrRS=null;
$aLinea=null;
$j=0;
$oPersHosp=null;
$arrResultado=false;
$oUsu=new Usuario();

	if (isset($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
		$sNom = $oUsu->getPers()->getNombre();
       // echo $sNom;
      
	}
	else
		$sErr = "Debe estar firmado";

if ($oAccesoDatos->conectar()){
    $sQuery = "SELECT Id,fecha, cliente,lugar, total,estado
				FROM venta WHERE cliente='".$sNom."' 
				";
    $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
    $oAccesoDatos->desconectar();
if ($arrRS){
?>


<section>
<div class="container">
    
    <br>
	<left> <h1> Pedidos </h1> </left>
    <hr/>
                <center>
                <table id="Usuarios" style="width: 60%; height: 50%">
					<tr>
						<th style="text-align: center">Id venta</th>
						<th style="text-align: center">Fecha</th>
						<th style="text-align: center">Cliente</th>
                        <th style="text-align: center">Lugar de entrega</th>
                        <th style="text-align: center">Total a pagar</th>
                        <th style="text-align: center">Estado</th>
                        <th style="text-align: center">Detalle Venta</th>

					</tr>
                <?php foreach($arrRS as $aLinea){
					
					$id=$aLinea[0];
					$fecha=$aLinea[1];
					$cliente=$aLinea[2];
                    $lugar=$aLinea[3];
					$total=$aLinea[4];
                    $estado=$aLinea[5];
					?>


                
					<tr>
						<td class="llave"><?php echo $id; ?></td>
						<td><?php echo $fecha; ?></td>
                        <td><?php echo $cliente; ?></td>
                        <td><?php echo $lugar; ?></td>
                        <td>$ <?php echo $total; ?></td>
                        <td><?php echo $estado; ?></td>
                        <td><a class="btn btn-elegant" href="detalle.php?id=<?php echo $id; ?>">Ver Detalle</a></td>
					</tr>
                    <?php
                    }?>
				</table>
			</center>
               <?php 
			}
			else
				echo "<br><br><br><h1>No existen pedidos</h1><br><br><br>";
        }
		//return $arrResultado;
?>

</div>
</section>
<?php
include_once("pie.html");
?>