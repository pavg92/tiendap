
<?php 
include_once("cabecera.php");
?>

<script type="text/javascript">
  //Animacion cabecera
  
  $(document).ready(function(){
  $(window).scroll(function(){
    if( $(this).scrollTop() > 0 ){
      $('header').addClass('header2');
    } else {
      $('header').removeClass('header2');
    }
   });
 
  });


</script>

  <div class="view" style="background-image: url('img/banner7.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
           
    <div class="mask rgba-black-light align-items-center">
    <!-- Content -->
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-4 white-text text-center">
            <br> <br> <br> <br> <br> <br>
              <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInDown" data-wow-delay="0.3s"><strong>JUQUILITA</strong></h1>
              <hr class="hr-light my-4 wow fadeInDown" data-wow-delay="0.4s">
              <h5 class="text-uppercase mb-4 white-text wow fadeInDown" data-wow-delay="0.4s"><strong>Tienda de ropa</strong></h5>
              <a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s"  id="boton1" onclick="location.href='registro.php'">Regisrarse</a>
              <a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s"  id="boton2" onclick="location.href='IniciarPerfil.php'">Iniciar sesion</a>
          </div>
        </div>
      </div>
    </div>
            
  </div>



<?php
include_once("pie.html");
?>
