<?php

$nombre=$_POST['nombre'];
$dir=$_POST['dir'];
$email=$_POST['email'];
$pass=$_POST['pass'];


	$reqlen= strlen($nombre) * strlen($dir) * strlen($email) * strlen($pass);
	if ($reqlen > 0) {
          $arreglo[]=array('Nombre'=>$nombre,'Domicilio'=>$dir,
        'Correo_electronico'=>$email,'Contraseña'=>$pass);
        $_SESSION['user']=$arreglo;
        require 'modelo/introUser.php';
					echo '<center><h5>va a registro.</h5></center>';
	} else {
		echo '<center><h5>Por favor, rellene todos los campos requeridos.</h5></center>';
	}
?>
