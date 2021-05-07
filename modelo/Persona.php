<?php
/*
Archivo:  Persona.php
Objetivo: clase que encapsula la información de una persona
Autor:    
*/
class Persona{
	protected $sNombre="";
	protected $sCorreo="";
	protected $sContra="";
	protected $dFechaNacim=null;
	protected $sDomicilio="";
   
    function setNombre($psNombre){
       $this->sNombre = $psNombre;
    }
    function getNombre(){
       return $this->sNombre;
    }
   
    function setCorreo($psCorreo){
       $this->sCorreo = $psCorreo;
    }   
    function getCorreo(){
       return $this->sCorreo;
    }
   
    function setContra($psContra){
       $this->sContra = $psContra;
    }
    function getContra(){
       return $this->sContra;
    }
   
    function setFechaNacim($pdFechaNacim){
       $this->dFechaNacim = $pdFechaNacim;
    }
    function getFechaNacim(){
       return $this->dFechaNacim;
    }
   
    function setDomicilio($psDomicilio){
       $this->sDomicilio = $psDomicilio;
    }
    function getDomicilio(){
       return $this->sDomicilio;
    }
	
	function getNombreCompleto(){
		return $this->sApePat." ".$this->sApeMat." ".$this->sNombre;
	}
}
?>