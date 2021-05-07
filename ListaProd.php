
<?php
/*************************************************************/
/* Archivo:  inicio.php
 * Objetivo: página de sesión iniciada
 * Autor:  BAOZ
 *************************************************************/
include_once("modelo\bProd.php");
session_start();
$sErr = "";
$sNomP="";
$sDepar="";
$sDes="";
$sPrecio="";
$sStock=0;
$sId=0;
$sTipo=0;
$oUsu=new bProd();

	if (isset($_SESSION["usu1"])){
		$oUsu = $_SESSION["usu1"];
        $sId=$oUsu->getPersHosp()->getIdPersonal();
		$sNomP = $oUsu->getPersHosp()->getNombreP();
        $sDepar = $oUsu->getPersHosp()->getDepar();
        $sDes = $oUsu->getPersHosp()->getDescrip();
		$sPrecio = $oUsu->getPersHosp()->getPrecio();
        $sIma=$oUsu->getPersHosp()->getImagen();
        $sStock=$oUsu->getPersHosp()->getStock();
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


<?php
//include_once("pie.html");
if(isset($_GET["m"])){
    $m=$_GET["m"];
    switch($m){
        case"1":
                echo "<h3><b>El producto no tiene stock suficiente</b></h3>";
            break;
        case "2":
                echo "<h3><b>La cantidad debe ser mayor a 0</b></h3>";
            break;
    }
}
?>

<?php     
include_once("aside.html");
?> 


  <section>
  <h2 id="Agregar">Producto encontrado</h2>
  <br>
  
  <div class="card" style="display:flex;" >
  
  <div style="display: flex; padding: 15px;">
  <div class="view zoom overlay z-depth-2 rounded" style="width: 30%">
     
     <center> <img class="card-img-top" style="width: 10em" src="<?php echo $sIma; ?>"/> </center>
     <a href="#!">
     <div class="mask">
     <center> <img class="card-img-top" src="<?php echo $sIma; ?>"> </center></div> 
     </a>

    </div>
    
    <div  style="padding: 15px;">
    <table>
    <td>
    <strong> Nombre: </strong>
    <?php echo $sNomP; ?>
    </td>
    
    <tr>
    <td>
    <strong> Descripcion </strong>
    <?php echo $sDes; ?>
    </td>
    </tr>
    
    <tr>
    <td>
    <strong>Precio: </strong>
    <?php echo $sPrecio; ?>
    </td>
    </tr>
    
    <tr>
   <td id="stock<?php echo $sId; ?>">
    <Strong style="color: red"> Stock: </Strong>
    <?php echo $sStock; ?>
    </td>
    </tr>
    
    <tr>
    <td>
        <script src="js/ctrlLogin.js"></script>
    <form id="frmLogin"  onsubmit="llamaLogin(txtCan.value,txtNom.value,txtDescrip.value,txtPrecio.value,txtIma.value,txtStock.value,txtId.value); return false;">
    <strong> Cantidad: </strong> 
              <input type="number" name="txtCan" required="true">
              <?php
              echo "<input type='hidden' name='txtNom' value='".$sNomP."'>";
              echo "<input type='hidden' name='txtDescrip' value='".$sDes."'>";
              echo "<input type='hidden' name='txtPrecio' value='".$sPrecio."'>";
              echo "<input type='hidden' name='txtIma' value='".$sIma."'>";
              echo "<input type='hidden' id='stockv".$sId."' name='txtStock' value='$sStock'>";
               echo "<input type='hidden' name='txtId' value='$sId'>";
              echo "<input type='hidden' name='txtL' value='0'>";
              
              ?><br><br>
          <button type="submit" class="btn btn-elegant" id="boton1"  > <b>Agregar</b></button>
            </form>  
        </td>
    </tr>
  </table>

</div>


</div>
</div>

<br>
  <button type="button"  class="btn btn-info"  id="boton1" onclick="location.href='ListaProd2.php'" > <a  href="#"> <b>Regresar</b></a></button>

</section>
<?php
include_once("pie.html");

?>
