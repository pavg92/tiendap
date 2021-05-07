<?php
/*
Archivo:  PersonalHospitalario.php
Objetivo: clase que encapsula la información de una persona que labora en el hospital
Autor:    
*/
include_once("AccesoDatos.php");
include_once("dProd.php");
require_once ("Producto.php");
require_once ("Detalle.php");
class aProd extends dProd{
	private $nTipo=0;
	private $nIdPersonal=0;
	
	//Constantes para mejor lectura de código
	CONST TIPO_ADM = 1;
   
    function setTipo($pnTipo){
       $this->nTipo = $pnTipo;
    }
    function getTipo(){
       return $this->nTipo;
    }
   
    function setIdPersonal($pnIdPersonal){
       $this->nIdPersonal = $pnIdPersonal;
    }   
    function getIdPersonal(){
       return $this->nIdPersonal;
    }
	
	/*Busca por clave, regresa verdadero si lo encontró*/
	function buscar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$bRet = false;
		if ($this->nIdPersonal==0)
			throw new Exception("PersonalHospitalario->buscar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = " SELECT Nombre,Departamento, Descripcion, Precio, Stock, Imagen
							FROM productos
							WHERE IdProducto = ".$this->nIdPersonal;
				$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
				$oAccesoDatos->desconectar();
				if ($arrRS){
					$this->sNombreP = $arrRS[0][0];
					$this->sDepar = $arrRS[0][1];
					$this->sDescrip = $arrRS[0][2];
					//$this->dFechaNacim = DateTime::createFromFormat('Y-m-d',$arrRS[0][3]);
					$this->sPrecio = $arrRS[0][3];
					$this->sStock = $arrRS[0][4];
                    $this->sImagen = $arrRS[0][5];
					$bRet = true;
				}
			} 
		}
		return $bRet;
	}
	/*Insertar, regresa el número de registros agregados*/
	function insertar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->sNombreP == "" OR $this->sDepar == "" OR 
		    $this->sDescrip == "" OR $this->sPrecio == "")
			throw new Exception("PersonalHospitalario1->insertar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "INSERT INTO productos (Nombre, Descripcion, Departamento, 
											Precio, Stock, Imagen) 
					VALUES ('".$this->sNombreP."', '".$this->sDescrip."', 
					'".$this->sDepar."',
					'".$this->sPrecio."','".$this->sStock."','".$this->sImagen."');";
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();			
			}
		}
		return $nAfectados;
	}
	
	/*Modificar, regresa el número de registros modificados*/
	function modificar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->nIdPersonal==0 OR $this->sNombreP == "" OR $this->sDepar == "" OR 
		    $this->sDescrip == "" OR $this->sPrecio == "")
			throw new Exception("PersonalHospitalario->modificar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
                if($this->sImagen==""){
                   $sQuery = "UPDATE productos 
					SET Nombre= '".$this->sNombreP."' , 
					Descripcion= '".$this->sDescrip."' , 
					Departamento= '".$this->sDepar."',
					Precio = '".$this->sPrecio."',
                    Stock = '".$this->sStock."'
					WHERE IdProducto = ".$this->nIdPersonal; 
                }else{
                   $sQuery = "UPDATE productos 
					SET Nombre= '".$this->sNombreP."' , 
					Descripcion= '".$this->sDescrip."' , 
					Departamento= '".$this->sDepar."',
					Precio = '".$this->sPrecio."',
                    Stock = '".$this->sStock."',
                    Imagen = '".$this->sImagen."'
					WHERE IdProducto = ".$this->nIdPersonal; 
                }
		 		
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();
			}
		}
		return $nAfectados;
	}
	
	/*Borrar, regresa el número de registros eliminados*/
	function borrar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->nIdPersonal==0)
			throw new Exception("PersonalHospitalario1->borrar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "DELETE FROM productos 
							WHERE IdProducto = ".$this->nIdPersonal;
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();
			}
		}
		return $nAfectados;
	}
	
	/*Busca todos los registros del personal hospitalario, 
	 regresa falso si no hay información o un arreglo de PersonalHospitalario*/
	function buscarTodos(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$aLinea=null;
	$j=0;
	$oPersHosp=null;
	$arrResultado=false;
		if ($oAccesoDatos->conectar()){
		 	$sQuery = "SELECT IdProducto,Nombre, Departamento, Descripcion, 
							  Precio, Stock, Imagen
				FROM productos
                WHERE Stock > 0
				ORDER BY IdProducto";
			$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
			$oAccesoDatos->desconectar();
			if ($arrRS){
				foreach($arrRS as $aLinea){
					$oPersHosp = new aProd();
					$oPersHosp->setIdPersonal($aLinea[0]);
					$oPersHosp->setNombreP($aLinea[1]);
					$oPersHosp->setDepar($aLinea[2]);
					$oPersHosp->setDescrip($aLinea[3]);
					//$oPersHosp->setFechaNacim(DateTime::createFromFormat('Y-m-d',$aLinea[4]));
					$oPersHosp->setPrecio($aLinea[4]);
					$oPersHosp->setStock($aLinea[5]);
                    $oPersHosp->setImagen($aLinea[6]);
            		$arrResultado[$j] = $oPersHosp;
					$j=$j+1;
                }
			}
			else
				$arrResultado = false;
        }
		return $arrResultado;
	}
    
    function buscarTodosAdmin(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$aLinea=null;
	$j=0;
	$oPersHosp=null;
	$arrResultado=false;
		if ($oAccesoDatos->conectar()){
		 	$sQuery = "SELECT IdProducto,Nombre, Departamento, Descripcion, 
							  Precio, Stock, Imagen
				FROM productos
				ORDER BY IdProducto";
			$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
			$oAccesoDatos->desconectar();
			if ($arrRS){
				foreach($arrRS as $aLinea){
					$oPersHosp = new aProd();
					$oPersHosp->setIdPersonal($aLinea[0]);
					$oPersHosp->setNombreP($aLinea[1]);
					$oPersHosp->setDepar($aLinea[2]);
					$oPersHosp->setDescrip($aLinea[3]);
					//$oPersHosp->setFechaNacim(DateTime::createFromFormat('Y-m-d',$aLinea[4]));
					$oPersHosp->setPrecio($aLinea[4]);
					$oPersHosp->setStock($aLinea[5]);
                    $oPersHosp->setImagen($aLinea[6]);
            		$arrResultado[$j] = $oPersHosp;
					$j=$j+1;
                }
			}
			else
				$arrResultado = false;
        }
		return $arrResultado;
	}
    
    function actStock($id,$stockDes){
        $oAccesoDatos=new AccesoDatos();
        $nAfectados=-1;
        if ($oAccesoDatos->conectar()){
        $sQuery= "select Stock from productos where IdProducto = $id";
        $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
       
        
        $stockActual=0;
        if ($arrRS){
				foreach($arrRS as $aLinea){
            $stockActual=$aLinea[0];
        }
        }
        $stockActual-=$stockDes;
        $sQuery= "update productos set Stock =$stockActual where IdProducto = $id";
        $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
        $oAccesoDatos->desconectar();
    }
    }
      function actStock2($id,$stockDes){
        $oAccesoDatos=new AccesoDatos();
        $nAfectados=-1;
        if ($oAccesoDatos->conectar()){
        $sQuery= "select Stock from productos where IdProducto = $id";
        $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
       
        
        $stockActual=0;
        if ($arrRS){
				foreach($arrRS as $aLinea){
            $stockActual=$aLinea[0];
        }
        }
        $stockActual+=$stockDes;
        $sQuery= "update productos set Stock =$stockActual where IdProducto = $id";
        $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
        $oAccesoDatos->desconectar();
    }
    }
    
    function crearVenta($listaProd,$total,$cliente,$lugar){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $nAfectados=-1;
         $p= new Producto();
                if ($oAccesoDatos->conectar()){
                    $sQuery = "INSERT INTO venta VALUES (null, now(),'".$cliente."',$total,'".$lugar."','pendiente');";
                    $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
                    
                     $sQuery = "select max(id) from venta";
                     $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
                    
                    $idUltimaVenta=0;
                    if ($arrRS){
				        foreach($arrRS as $aLinea){
                            $idUltimaVenta=$aLinea[0];
                        }
                    }
                    
                    foreach($listaProd as $p){
                        $sQuery = "insert into detalleventa values(null,
                        '".$idUltimaVenta."',
                        '".$p->nombre."',
                        '".$p->cantidad."',
                        '".$p->subtotal."')";
                        $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
                    }
                    $oAccesoDatos->desconectar();			
                }
            return $nAfectados;
    }
     function entrega($id){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $nAfectados=-1;
         $p= new Producto();
                if ($oAccesoDatos->conectar()){
                    $sQuery = "UPDATE venta SET estado='entregado' WHERE id=".$id.";";
                    $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
                    $oAccesoDatos->desconectar();			
                }
            return $nAfectados;
    }
    
    function getDetalle($idVenta){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $sQuery = "SELECT producto, cantidad, subtotal FROM detalleventa WHERE venta = $idVenta";
        $oAccesoDatos->conectar();
        $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
        $oAccesoDatos->desconectar();
        
        $detalles = array();
        
        if ($arrRS){
				foreach($arrRS as $aLinea){
                    $d = new Detalle();
                    $d->producto = $aLinea[0]; 
                    $d->cantidad = $aLinea[1];
                    $d->subtotal = $aLinea[2];
                    
                    array_push($detalles, $d);
                    
					
                }
			}
			else
				$arrResultado = false;
        
		return $detalles;
        
    }
}
?>