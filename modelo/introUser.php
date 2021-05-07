<?php
include 'AccesoDatos.php';
if(isset($_SESSION['user'])){
  $usu=$_SESSION['user'];
  $nAfectados=-1;
    $conn=new AccesoDatos();
  if ($conn->conectar()){
  $sQuery ="INSERT INTO usuarios (Correo_electronico,Contrasenia,Nombre,Domicilio)
   VALUES ('".$usu[0]['Correo_electronico']."','".$usu[0]['Contraseña']."','".$usu[0]['Nombre']."',
    '".$usu[0]['Domicilio']."')";
  $nAfectados = $conn->ejecutarComando($sQuery);
  $conn->desconectar();
  }
unset($_SESSION['user']);
header("Location:../diseño/IniciarPerfil.php");
}
