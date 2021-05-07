<?php
//session_start();
include_once("modelo\Usuario.php");
require_once "Producto.php";
include_once("cabecera.php");
include_once("menu.php");
include_once("aside.html");
?>
  <link rel="stylesheet" type="text/css" href="css/estilo1.css">
<body>

<section>

<center> 
<h2 id="Agregar">Realizar Compra</h2>       
<div class="container">

</center> 
<?php
     // for ($i=0; $i <count($prod) ; $i++) {
?>
      <?php 
    session_start();
    if(isset($_SESSION["carrito"])){
        $carrito= $_SESSION["carrito"];
        $p= new Producto();
    }else
        header("location: GuardarSelec.php");
    
          
    ?>
  <center>
  <table id="Usuarios" style="width: 70%; height: 30%">
      <th>Id</th>
      <th>Producto</th>
      <th>Decripcion</th>
      <th>Precio Prod  </th>
      <th>Cantidad</th>
      <th>subtotal</th>
      
       
      <?php
      $i=0;
      $total=0;
      foreach($carrito as $p){
          
    ?>
      
    <tr>
      <td><?php echo $p->id;?></td>
      <td><?php echo $p->nombre;?></td>
      <td><?php echo $p->descrip;?></td>
      <td>$ <?php echo $p->precio;?> MXN </td>
      <td><?php echo $p->cantidad;?></td>
      <td>$<?php echo $p->subtotal;?> MXN</td>
        <?php $total+= $p->subtotal;
        $i++;
        ?>
       
    </tr>
          <?php
}
      ?>
      <tr>
          <td colspan="5"><b>Total</b></td>
          <td ><b>$<?php echo $total;?> MXN</b></td>
          <?php
          $_SESSION["total"]= $total;
          ?>
      
      </tr>

  </table>
      </center>

<br> <br>

  <center><h2>Info cliente</h2> </center>
<?php
$sErr = "";
$sNom="";
$sCorreo="";
$sId=0;
$sTipo="";
$oUsu=new Usuario();

	if (isset($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
		$sNom = $oUsu->getPers()->getNombre();
        $sCorreo = $oUsu->getPers()->getCorreo();
        $sId = $oUsu->getPers()->getIdPersonal();
		$sTipo = $_SESSION["tipo"];
	}
	else
		$sErr = "Debe estar firmado";

	/*if ($sErr == ""){
		include_once("cabecera.php");
		include_once("menu.php");
		include_once("aside.html");
	}
	else{
		header("Location: error.php?sErr=".$sErr);
		exit();
	}*/
 ?>
  <center>
  <table id="Usuarios" style="width: 40%; height: 10%">
      <th>Id cliente</th>
      <th>Cliente</th>
      <th>Correo</th>
    
    <tr>
      <td><?php echo $sId; ?></td>
      <td><?php echo $sNom; ?></td>
      <td><?php echo $sCorreo; ?></td>
    </tr>
 <?php
          $_SESSION["cliente"]= $sNom;
          ?>
     
</table>
      
<br>

<center><h2>Selecciona el lugar de entrega</h2> </center>
<form method="post" action="generarVenta.php">
      <select name="lugar">
        <option value="cordoba">Cordoba</option>
        <option value="orizaba">Orizaba</option>
      </select>
<br><br><br>

<h2>El pago se realizar&aacute; al momento de recoger su mercancia. <br>Presente una identificacion oficial</h2>
</center>

<br> 
   
</div>
<center>
     <button type="submit" class="btn btn-cyan"   id="boton1" > Realizar Compra</button></form>
<button type="submit" class="btn btn-danger"   id="boton2"><a href="GuardarSelec.php"> <b style="color: white">Modificar Carrito</b></a></button>

</center>
</section>
</body>