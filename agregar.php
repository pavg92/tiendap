<?php 
require_once "Producto.php";
include_once("modelo\aProd.php");

$p= new Producto();
$oPers = new aProd();
$arrPers=null;
$p->cantidad= $_REQUEST["txtCan"];
$sJsonRet ="";
$sErr =-1;

if($p->cantidad>0){
    $p->nombre= $_REQUEST["txtNom"];
    $p->id= $_REQUEST["txtId"];
    $p->descrip= $_REQUEST["txtDescrip"];
    $p->precio= $_REQUEST["txtPrecio"];
    $p->imagen= $_REQUEST["txtIma"];
    $p->stock= $_REQUEST["txtStock"];
    $p->subtotal= $p->precio * $p->cantidad;

    session_start();
    if(isset($_SESSION["carrito"])){
        $carrito = $_SESSION["carrito"];
    }else{
        $carrito= array();
    }
    
    $sumacantidades=0;
    foreach($carrito as $pro){
        if($pro->id == $p->id){
            //$sumacantidades += $pro->cantidad;
        }
    }
   $sumacantidades += $p->cantidad;
    if($p->stock >= $sumacantidades){
        array_push($carrito,$p);
        
        
        try{
			$oPers->actStock($p->id,$p->cantidad);
            //header("location: ListaProd2.php?m=3");
		}catch(Exception $e){
			//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
             header("location: ListaProd2.php?m=3");
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error en base de datos, comunicarse con el administrador";
		}
        $_SESSION["carrito"]= $carrito;
      //header("location: GuardarSelec.php");
        $sJsonRet = '{
			"sNombreCompleto":"'.$sErr.'",
			"nTipo":'.$sErr.'
		}';
    }else{
        $sJsonRet ='{
            "sNombreCompleto":"'.$sErr.'",
            "sDescTipo":"",
            "nTipo":1
            }';
       /* if($_POST["txtL"]==0)
            header("location: ListaProd.php?m=1");
        else
           header("location: ListaProd2.php?m=1"); */
    }
    
}else{
    $sJsonRet ='{
        "sNombreCompleto":"'.$sErr.'",
        "sDescTipo":"",
        "nTipo":2
        }';
    /*if($_POST["txtL"]==0)
            header("location: ListaProd.php?m=2");
    else
        header("location: ListaProd2.php?m=2");*/     
}
echo $sJsonRet;

?>
