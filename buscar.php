
<?php
/*************************************************************/
/* Archivo:  inicio.php
 * Objetivo: página de sesión iniciada
 * Autor:  BAOZ
 *************************************************************/
include_once("modelo\Usuario.php");
session_start();
$sErr = "";
$sNom="";
$sTipo="";
$oUsu=new Usuario();

	if (isset($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
		$sNom = $oUsu->getPers()->getNombre();
		$sTipo = $_SESSION["tipo"];
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
if(isset($_GET["c"])){
    $m=$_GET["c"];
  if($m==1){?>
      <!-- echo "<h3><b>Se realizo tu transaccion, puedes pasar por tus productos</b></h3>"</-!>-->
    <script type="text/javascript">

        alert("se realizo la transaccion, puedes pasar por tus productos")
    </script>


<?php
      unset($_SESSION["carrito"]);
  }
    
}
?>


<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/banner8.jpg"
        alt="First slide">
    </div>
    <!--/First slide-->
    <!--Second slide-->
    <div class="carousel-item">
      <img class="d-block w-100" src="img/banner2.jpg"
        alt="Second slide">
    </div>
    <!--/Second slide-->
    <!--Third slide-->
    <div class="carousel-item">
      <img class="d-block w-100" src="img/banner3.jpg"
        alt="Third slide">
    </div>
    <!--/Third slide-->
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->


            <!--
			<h1>Bienvenido <?php //echo $sNom;?></h1>
			<h3>Eres tipo <?php //echo $sTipo;?></h3> -->

<?php
include_once("aside.html");
?>
 
<section>

  <TABLE align="center"> 
    <TR>  
      <TD><TH ROWSPAN=2></TH>
     <link rel="stylesheet" type="text/css" href="css/estilo1.css">
     <TH></TH><TD><div id="w2b-searchbox">
     <br>
     <form id="w2b-searchform" action="login1.php" method="post">
    <input type="text" id="s" class="form-control" name="txtCve" value="" placeholder="Buscar Producto" onfocus='if undefinedthis.value == "Search...") {this.value = ""}' onblur='if undefinedthis.value == "")
      {this.value = "Search...";}'/>
                
      <TD> <button type="submit" class="btn btn-elegant"  id="boton2"> <b> Buscar </b></button></TD>
      </form>
      </TABLE>


<!-- Grid row -->
<div class="gallery" id="gallery">

  <!-- Grid column -->
  <div class="mb-3 pics animation all 2">
    <img class="img-fluid"  src="img/Imagen2.jpg" alt="Card image cap">
  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="mb-3 pics animation all 1">
    <img class="img-fluid" src="img/Imagen8.jpg" alt="Card image cap">
  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="mb-3 pics animation all 1">
    <img class="img-fluid" src="img/Imagen4.jpg" alt="Card image cap">
  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="mb-3 pics animation all 2">
    <img class="img-fluid"  src="img/Imagen9.jpg" alt="Card image cap">
  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="mb-3 pics animation all 2">
    <img class="img-fluid"  src="img/Imagen1.jpg"alt="Card image cap">
  </div>
  <!-- Grid column -->

  <!-- Grid column -->
  <div class="mb-3 pics animation all 3">
    <img class="img-fluid" src="img/Imagen7.jpg" alt="Card image cap">
  </div>
  <!-- Grid column -->

</div>
<!-- Grid row -->

</section>

    <?php
include_once("pie.html");
?>
