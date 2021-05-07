<?php
/*************************************************************/
/* Archivo:  index.php
 * Objetivo: página inicial de manejo de catálogo,
 *           incluye manejo de sesiones y plantillas
 * Autor:BAOZ
 *************************************************************/

include_once("aside.html");
?> 

<link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
  <link href="css/estilo.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css">



    <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>
  
<script src="jslib/jquery-3.4.1_min.js"></script>
    <script src="jslib/jquery-ui/jquery-ui.js"></script>
        <script src="js/ctrlGlobal.js"></script>

<body>
  
<section>

    <div style="width:90%; display: flex; ">
    <div  style="width:60%">
    <fieldset>
  
    <form method="post">
    <center><h4> <strong> Registro de datos </strong></h4></center>
    <hr/>
    <label >Nombre</label>
    <input type="text" class="form-control mb-4"name="nombre" placeholder="ingrese su nombre" onkeypress="nombres();" class="registro2" required="true" />

    
    <label>Correo Electronico</label>
     <input type="email" class="form-control mb-4" name="email" id="e-mail" onkeyup="correo(email,'e-mail');" class="registro2" placeholder="TuCorreo@dominio.com" required="true"/>
    
    <label>Domicilio</label>
    <input type="text"class="form-control mb-4" name="dir" placeholder="Su direccion" class="registro2"  required="true" />
    
    <label >Contraseña</label>
    <input type="password" class="form-control mb-4" name="pass" placeholder="contraseña" class="registro2" placeholder="Tu Password" required="true"/>
       <center> <input type="submit" name="registrarme" class="btn btn-elegant" value="Registrar" id="boton" align="center"/>
       <button  type="button"  class="btn btn-info"  id="boton1" onclick="location.href='index.php'" > <a  href="#"> <b style="color:white">Regresar</b></a></button> 
       </center>

        
        </form>
  
    </fieldset>

    

 
  </div>
  
  <div style="width:50%; padding-left: 7px"> <center> <br>  <img src="img/Imagen3.jpg" width="95%"> </center> </div>
  </div>
  
             <?php
             if(isset($_POST['registrarme']))
               require("controlador/validarCampos.php");
             ?>

 
  </section>
<?php
include_once("pie.html");
?>
</body>
</html>
