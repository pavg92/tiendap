<?php
session_start();
include_once("modelo/AccesoDatos.php");
include_once("cabecera.php");

$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$aLinea=null;
	$j=0;
	$oPersHosp=null;
	$arrResultado=false;
		if ($oAccesoDatos->conectar()){
		 	$sQuery = "SELECT Id,fecha, cliente,lugar, total
				FROM venta WHERE estado='pendiente' 
				ORDER BY Id";
			$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
			$oAccesoDatos->desconectar();
			if ($arrRS){
				?>


<section>
<div class="container">
    
    <br>
	<left> <h1> Ventas </h1> </left>
    <hr/>
                <center>
                <table id="Usuarios" style="width: 60%; height: 50%">
					<tr>
						<th style="text-align: center">Id venta</th>
						<th style="text-align: center">Fecha</th>
						<th style="text-align: center">Cliente</th>
                        <th style="text-align: center">Lugar de entrega</th>
                        <th style="text-align: center">Total a pagar</th>
                        <th style="text-align: center">Detalle Venta</th>
                         <th style="text-align: center">Entregar</th>

					</tr>
                <?php foreach($arrRS as $aLinea){
					
					$id=$aLinea[0];
					$fecha=$aLinea[1];
					$cliente=$aLinea[2];
                    $lugar=$aLinea[3];
					$total=$aLinea[4];
					?>


                
					<tr>
						<td class="llave"><?php echo $id; ?></td>
						<td><?php echo $fecha; ?></td>
                        <td><?php echo $cliente; ?></td>
                        <td><?php echo $lugar; ?></td>
                        <td>$ <?php echo $total; ?></td>
                        <td><a class="btn btn-elegant" href="detalle.php?id=<?php echo $id; ?>">Ver Detalle</a></td>
                        <td><a class="btn btn-elegant" href="entregar.php?id=<?php echo $id; ?>">Entregado</a></td>
					</tr>
                    <?php
                    }?>
				</table>
			</center>
               <?php 
			}
			else
				$arrResultado = false;
        }
		//return $arrResultado;
?>

</div>
</section>
<?php
include_once("pie.html");
?>