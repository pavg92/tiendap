<?php
/*************************************************************/
/* Archivo:  index.php
 * Objetivo: página inicial de manejo de catálogo,
 *           incluye manejo de sesiones y plantillas
 * Autor:BAOZ
 *************************************************************/
include_once("cabecera.php");
include_once("aside.html");
?>


<section>
<br> <br>
<center> <div style="display: flex;" class="container">
<div style="width: 50%;">
<center><h4> <strong> Inicia sesion</h4> </strong></center>
<hr/>
  <form id="frm" action="login.php" method="post">
      <label  for="correo">Correo Electronico</label>
      <input class="form-control mb-4"type="email" id="correo" name="txtCve" placeholder="TuCorreo@dominio.com " required="true">
    
      <label  for="password">Contraseña</label>
      <input class="form-control mb-4" type="password" name="txtPwd" placeholder="Tu Password" required="true">
     
   
    <button type="submit" class="btn btn-elegant" id="boton1" value="Iniciarr"> <b> Iniciar </b></button>

    <br> 
    <left> <button  type="button"  class="btn btn-info"  id="boton1" onclick="location.href='index.php'" > <a  href="#"> <b style="color:white">Regresar</b></a></button> </left>

   </form>
 </div>

   
<div> <img src="img/banner16.jpg" width="90%"> </div>
</div>
</section>


<?php
include_once("pie.html");
?>
