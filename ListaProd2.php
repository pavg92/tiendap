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


 
<img class="d-block w-100"  src="img/banner10.jpg">

<?php     
include_once("aside.html");
?> 

<section>


      <center> <h1> Catalogo </h1> </center>
      <hr/>


    <TABLE align="center"> 
  	<TR>	
      <TD><TH ROWSPAN=2></TH>
     <link rel="stylesheet" type="text/css" href="css/estilo1.css">
     <TH></TH><TD><div id="w2b-searchbox">
     <br>
     <form id="w2b-searchform" action="login1.php" method="post">
    <input type="text" id="s" class="form-control" name="txtCve" value="" placeholder="Buscar Producto" onfocus='if undefinedthis.value == "Search...") {this.value = ""}' onblur='if undefinedthis.value == "")
      {this.value = "Search...";}'/>
                
      <TD> <button type="submit" class="btn btn-elegant"   id="boton2"> <b> Buscar </b></button></TD>
      </form>
      </TABLE>
      <?php
        if ($arrPers!=null){
            foreach($arrPers as $oPers){

      ?>
      
  <br>
  <center> <div id="div<?php echo $oPers->getIdPersonal(); ?>" class="card" align="center" >
    
    <div  style="padding: 10px;display:flex" >
    <?php //while ($row = mysql_fetch_array($result)){?>

     <div style="width: 30%">
     <div class="view zoom overlay z-depth-2 rounded">
     <img class="card-img-top" style="width: 10em" src="<?php echo $oPers->getImagen(); ?>"/>
     <a href="#!">
     <div class="mask">
     <img class="card-img-top" src="<?php echo $oPers->getImagen(); ?>"></div>
     </div>
     </a>
     </div>

    
    <div  style="width: 30%;padding-left: 15px;">
    <table border="0">
    <tr>
    <td>
    <h4> Producto: </h4>   
    <Strong> Nombre: </Strong>
    <?php echo $oPers->getNombreP(); ?>
    </td>
    </tr>
    
    <tr>
    <td> 
    <Strong> Descripcion: </Strong>
    <?php echo $oPers->getDescrip(); ?>
    </td>
    </tr>
  

    <tr>
    <td>
    <Strong> Precio: </Strong>
    <?php echo $oPers->getPrecio(); ?>
    </td>
    </tr>
    
    <tr>
    <td id="stock<?php echo $oPers->getIdPersonal(); ?>"> 
    <Strong style="color: red"> Stock: </Strong>
    <?php echo $oPers->getStock(); ?>
    </td>
    </tr>

  </table>
   </div style="width: 30%">
    <script src="js/ctrlLogin.js"></script>
 
    <div>
          <form id="frmLogin"  onsubmit="llamaLogin(txtCan.value,txtNom.value,txtDescrip.value,txtPrecio.value,txtIma.value,txtStock.value,txtId.value); return false;">
              Cantidad: 
              <input type="number" class="form-control mb-4" name="txtCan" required="true">
              <?php
              echo "<input type='hidden' name='txtNom' value='".$oPers->getNombreP()."'>";
              echo "<input type='hidden' name='txtDescrip' value='".$oPers->getDescrip()."'>";
              echo "<input type='hidden' name='txtPrecio' value='".$oPers->getPrecio()."'>";
              echo "<input type='hidden' name='txtIma' value='".$oPers->getImagen()."'>";
              echo "<input type='hidden' id='stockv".$oPers->getIdPersonal()."' name='txtStock' value='".$oPers->getStock()."'>";
              echo "<input type='hidden' name='txtId' value='".$oPers->getIdPersonal()."'>";
              echo "<input type='hidden' name='txtL' value='1'>";
                
              ?>
          <button type="submit" class="btn btn-elegant"  id="boton1"  > <b>Agregar</b></button> <br>
            </form>  

  </div>          
       
</div>
</center>









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
</div>
</section>
<?php


include_once("pie.html");

?>
