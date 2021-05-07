<?php
/*
Archivo:  Usuario.php
Objetivo: clase que encapsula la información de un usuario
Autor:    
*/
include_once("AccesoDatos.php");
include_once("aProd.php");
class bProd{
	private $nClave = "";
	private $sPwd = "";
	private $oPersonalHosp = null;
	private $oAD = null;

	public function getPersHosp(){
		return $this->oPersonalHosp;
	}
	public function setPersHosp($valor){
		$this->oPersonalHosp = $valor;
	}

	public function getClave(){
		return $this->nClave;
	}
	public function setClave($valor){
		$this->nClave = $valor;
	}

	public function getPwd(){
		return $this->sPwd;
	}
	public function setPwd($valor){
		$this->sPwd = $valor;
	}
	
	public function buscarCvePwd(){
	$bRet = false;
	$sQuery = "";
	$arrRS = null;
		if (($this->nClave == "" /*|| $this->sPwd == ""*/) )
			throw new Exception("Usuario->buscar: faltan datos");
		else{
			$sQuery = "SELECT IdProducto 
					   FROM productos
					   WHERE Nombre = '".$this->nClave."'";
			//Crear, conectar, ejecutar, desconectar
			$oAD = new AccesoDatos();
			if ($oAD->conectar()){
				$arrRS = $oAD->ejecutarConsulta($sQuery);
				$oAD->desconectar();
				if ($arrRS != null){
					$this->oPersonalHosp = new aProd();
					$this->oPersonalHosp->setIdPersonal($arrRS[0][0]);
					$this->oPersonalHosp->buscar();
					$bRet = true;
				}
			}
		}
		return $bRet;
	}
}
?>