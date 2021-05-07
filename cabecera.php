<!DOCTYPE html>
<html>
	<head>
<title>InstaShop</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="Imagenes\app.png" />
    <meta charset="utf-8"/>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		

    
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

	</head>
	
	<body>
	<header>
            <div class="wrapper">
      <div class="logo">
        <img src="img/juquilita2.png" width="30%">
      </div>
      
      <nav>
        <?php
          //session_start();
        if (isset($_SESSION["tipo"])){
          if ($_SESSION["tipo"]=="Administrador"){
      ?>
          <a href="PerfilAdm.php">Inicio</a>
          <!--<a href="tabUsuarios.php">| AdminUsuarios</a>-->
          <a href="tabProd.php">| Productos</a>
          <a href="estadisticas.php">| VerPedidos</a>
          <a href="logout.php">| Salir</a>
       
        <?php
      } else if ($_SESSION["tipo"]=="Usuario"){
        ?>
          <a href="buscar.php">Inicio |</a>
          <a href="ListaProd2.php">Productos |</a>
          <a href="GuardarSelec.php">Carrito |</a>
          <a href="pedidocliente.php">Pedidos |</a>
          <a href="logout.php">Salir</a>
      <?php
    }else{
      ?>
          <a href="ListaProd2.php">Productos |</a>
          <a href="GuardarSelec.php">Carrito |</a>
          <a href="logout.php">Salir |</a>
      <?php
    }}
     ?>
      </nav>
    </header>
	</body>
	</html>
