<?php
session_start();
include_once("cabecera.php");
require_once "modelo/aProd.php";
$idVenta = $_GET["id"];
$d = new aProd();

$detalles = $d->getDetalle($idVenta);
$total = 0;
?>
<section>
<div class="container">
	<left> <h1> Venta  <?php echo $idVenta; ?></h1> </left>
    <hr/>
                <table id="Usuarios">
					<tr>
						<th style="text-align: center">Producto</th>
						<th style="text-align: center">Precio</th>
						<th style="text-align: center">Cantidad</th>
                        <th style="text-align: center">Subtotal</th>

					</tr>
                <?php foreach($detalles as $det){
					
					?>
					<tr>
						<td class="llave"><?php echo $det->producto; ?></td>
                        <td><?php $precio = $det->subtotal / $det->cantidad; echo $precio; ?></td>
						<td><?php echo $det->cantidad; ?></td>
                        <td><?php echo $det->subtotal; ?></td>
                        
					</tr>
                    <?php
                      $total+= $det->subtotal; 
                    }?>
                    <tr>
						<td colspan="3"><center><b>Total a pagar</b></center></td>
                        <td><?php echo $total; ?> </td>
                        
					</tr>
				</table>
    <br>
    <center><button  class="btn btn-elegant" type="button"  id="boton1" onclick="history.back()" > <a  href="#"> <b style="color:white">Regresar</b></a></button>
    </center>
    </div>
</section>
<?php
include_once("pie.html");
?>