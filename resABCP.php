<?php
/*
Archivo:  resABC.php
Objetivo: ejecuta la afectación al personal y retorna a la pantalla de consulta general
Autor:  BAOZ  
*/
include_once("modelo\aProd.php");
session_start();

$sErr=""; $sOpe = ""; $sCve = "";
$oPers = new aProd();

	/*Verificar que exista la sesión*/
	if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
		/*Verifica datos de captura mínimos*/
		if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
			isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
			$sOpe = $_POST["txtOpe"];
			$sCve = $_POST["txtClave"];
			$oPers->setIdPersonal($sCve);
			
			if ($sOpe != "b"){
				$oPers->setNombreP($_POST["txtNombre"]);
				$oPers->setDepar($_POST["txtDepar"]);
				$oPers->setDescrip($_POST["txtDescrip"]);
                $oPers->setPrecio($_POST["txtPrecio"]);
                $oPers->setStock($_POST["txtStock"]);
             
                 $allowedExts = array("gif", "jpeg", "jpg", "png");
                  $temp = explode(".", $_FILES["file"]["name"]);
                  $extension = end($temp);
                  $imagen="";
                  if ((($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))){
                    //Verificamos que sea una imagen
                     
                    if ($_FILES["file"]["name"] == ""){
                      //verificamos que venga algo en el input file
                      echo "Error numero: " . $_FILES["file"]["error"] . "<br>";
                        header("Location: tabProd.php?m=9");
                        
                    }else{
                      //subimos la imagen

                      $imagen="Imagenes/".$_FILES["file"]["name"];
                    
                      if(file_exists("Imagenes/".$_FILES["file"]["name"])){
                          echo $_FILES["file"]["name"] . " Ya existe. ";
                        }else{
                          move_uploaded_file($_FILES["file"]["tmp_name"],
                          "Imagenes/".$_FILES["file"]["name"]);
                          echo $imagen;
                         $oPers->setImagen($imagen);
                      }
                    }
                  }else{
                       header("Location: error.php?sError=".$sErr);
                   echo "Formato no soportado";
                  }
            }
			try{
				if ($sOpe == 'a')
					$nResultado = $oPers->insertar();
				else if ($sOpe == 'b')
					$nResultado = $oPers->borrar();
				else 
					$nResultado = $oPers->modificar();
				
				if ($nResultado != 1){
					$sError = "Error en bd";
				}
			}catch(Exception $e){
				//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
				error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
				$sErr = "Error en base de datos, comunicarse con el administrador";
			}
		}
		else{
			$sErr = "Faltan datos";
		}
	}
	else
		$sErr = "Falta establecer el login";
	
	if ($sErr == "")
		header("Location: tabProd.php");
	else
		header("Location: error.php?sError=".$sErr);
	exit();
?>