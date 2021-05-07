
<?php
//session_start();
require_once "Producto.php";
include_once("cabecera.php");
include_once("aside.html");
?>



<section>

<left> <h1> Carrito </h1> </left>
 <hr/> 
    
        
<TABLE align="center"> 
    <TR>  
      <TD><TH ROWSPAN=2></TH>
     <link rel="stylesheet" type="text/css" href="css/estilo1.css">
     <TH></TH><TD><div id="w2b-searchbox">
     
     <form id="w2b-searchform" action="login1.php" method="post">
     
    <input type="text" id="s" class="form-control" name="txtCve" value="" placeholder="Buscar Producto" onfocus='if undefinedthis.value == "Search...") {this.value = ""}' onblur='if undefinedthis.value == "")
      {this.value = "Search...";}'/>
                
      <TD> <button type="submit" class="btn btn-elegant"   id="boton2"> <b> Buscar </b></button></TD>
      </form>
      </TABLE>

<br>
<div class="container">
 
<?php
     // for ($i=0; $i <count($prod) ; $i++) {
?>
      <?php 
    session_start();
    if(isset($_SESSION["carrito"])){
        $carrito= $_SESSION["carrito"];
        $p= new Producto();

    
          
    ?>
  
  <table id="Usuarios">
      <th style="text-align: center">Imagen</th>
      <th style="text-align: center">Producto</th>
      <th style="text-align: center">Decripcion</th>
      <th style="text-align: center">  Precio  </th>
      <th style="text-align: center">Cantidad</th>
      <th style="text-align: center">subtotal</th>
      <th></th>
       
      <?php
      $i=0;
      $total=0;
      foreach($carrito as $p){
          
    ?>
      
    <tr>
      <td align="center"><img src="<?php echo $p->imagen;?>" height="50px" /></td>
      <td><?php echo $p->nombre;?></td>
      <td><?php echo $p->descrip;?></td>
      <td>$ <?php echo $p->precio;?> MXN </td>
      <td><?php echo $p->cantidad;?></td>
      <td>$<?php echo $p->subtotal;?> MXN</td>
        <?php $total+= $p->subtotal;
        $i++;
        ?>
        <td><a style="color:red"  href="eliminar.php?in=<?php echo $i;?>&can=<?php echo $p->cantidad;?>&id=<?php echo $p->id;?>"><b>ELIMINAR</b></a></button>
       </td>
    </tr>
          <?php
}
      ?>
      <tr>
          <td colspan="6">Total</td>
          <td >$<?php echo $total;?> MXN</td>
      
      </tr>
   <?php
      }else
        echo "<h1>No haz seleccionado productos</h1>";
      ?>
  </table>
</fieldset>
 
    
</div>
<br><br>
<br><br>
<center>
     <button type="button"  class="btn btn-warning"  id="boton1" onclick="location.href='ListaProd2.php'" > <a  href="#"> <b style="color: white">Regresar</b></a></button>

     <button type="submit"   class="btn btn-info"  id="boton2"><a href="realizarCompra.php"> <b style="color: white"> Datos Correctos</b></a></button>

<br><br>
<br><br>
</center>


</section>

<?php
include_once("pie.html");
?>
