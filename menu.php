
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
<br><br>
        <nav>
            <?php
				if (isset($_SESSION["tipo"])){
					if ($_SESSION["tipo"]=="Administrador"){
			?>
        <ul>
          <li><a href="PerfilAdm.php" class="menu">Inicio</a></li>
         <!-- <li><a href="tabUsuarios.php" class="menu">AdminUsuarios</a></li>-->
          <li><a href="tabProd.php" class="menu">Productos</a></li>
          <li><a href="estadisticas.php" class="menu">VerPedidos</a></li>
  				<li><a href="logout.php" class="menu">Salir</a></li>
        </ul>
        <?php
      } else if ($_SESSION["tipo"]=="Usuario"){
        ?>
        <ul>
          <li><a href="buscar.php" class="menu">Inicio</a></li>
          <li><a href="ListaProd2.php" class="menu">Productos</a></li>
            <li><a href="GuardarSelec.php" class="menu">Carrito</a></li>
  				<li><a href="logout.php" class="menu">Salir</a></li>
        </ul>
			<?php
    }else{
			?>
			 
      <?php
    }}
     ?>
        </nav>
