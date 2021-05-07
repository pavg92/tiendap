<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario de Registro SCIII</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="group">
  <form action="registro.php" method="POST">
  <h2><em>Formulario de Registro</em></h2>

      <label for="nombre">Nombre <span><em>(requerido)</em></span></label>
      <input type="text" name="nombre" class="form-input" required/>

      <label for="apellido">Apellido <span><em>(requerido)</em></span></label>
      <input type="text" name="apellido" class="form-input" required/>

      <label for="email">Email <span><em>(requerido)</em></span></label>
      <input type="email" name="email" class="form-input" />
     <center> <input class="form-btn" name="submit" type="submit" value="Suscribirse" /></center>
    </p>
  </form>
</div>
</body>
</html>

<?php
$db_host="localhost";
$db_user="nombre_de_usuario";
$db_password="contraseña";
$db_name="nombre_de_base_de_datos";
$db_table_name="nombre_de_tabla";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
$subs_name = utf8_decode($_POST['nombre']);
$subs_last = utf8_decode($_POST['apellido']);
$subs_email = utf8_decode($_POST['email']);

$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_email."'", $db_connection);

if (mysql_num_rows($resultado)>0)
{

header('Location: Fail.html');

} else {

	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`Nombre` , `Apellido` , `Email`) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '")';

mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);

if (!$retry_value) {
   die('Error: ' . mysql_error());
}

header('Location: Success.html');
}

mysql_close($db_connection);

?>
