<?php
/*
Archivo:  Usuario.php
Objetivo: clase que encapsula la información de un usuario
Autor:    
*/
include_once("AccesoDatos.php");
include_once("Personal.php");
class Usuario{
	private $nCorreo = "";
	private $sPwd = "";
	private $oPersonal = null;
	private $oAD = null;

	public function getPers(){
		return $this->oPersonal;
	}
	public function setPers($valor){
		$this->oPersonal = $valor;
	}

	public function getCorreo(){
		return $this->nCorreo;
	}
	public function setCorreo($valor){
		$this->nCorreo = $valor;
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
		if (($this->nCorreo == "" || $this->sPwd == "") )
			throw new Exception("Usuario->buscar: faltan datos");
		else{
			$sQuery = "SELECT IdUsuario 
					   FROM Usuarios
					   WHERE Correo_electronico = '".$this->nCorreo."' 
					   AND contrasenia = '".$this->sPwd."'";
			//Crear, conectar, ejecutar, desconectar
			$oAD = new AccesoDatos();
			if ($oAD->conectar()){
				$arrRS = $oAD->ejecutarConsulta($sQuery);
				$oAD->desconectar();
				if ($arrRS != null){
					$this->oPersonal = new Personal();
					$this->oPersonal->setIdPersonal($arrRS[0][0]);
					$this->oPersonal->buscar();
					$bRet = true;
				}
			}
		}
		return $bRet;
	}
}
?>