<?php
/*
Archivo:  Persona.php
Objetivo: clase que encapsula la información de una persona
Autor:    
*/
class dProd{
	protected $sNombreP="";
	protected $sDepar="";
	protected $sDescrip="";
	protected $dFechaNacim=null;
	protected $sPrecio="";
    protected $sStock="";
    protected $sImagen="";
   
    function setNombreP($psNombreP){
       $this->sNombreP = $psNombreP;
    }
    function getNombreP(){
       return $this->sNombreP;
    }
   
    function setDepar($psDepar){
       $this->sDepar = $psDepar;
    }   
    function getDepar(){
       return $this->sDepar;
    }
   
    function setDescrip($psDescrip){
       $this->sDescrip = $psDescrip;
    }
    function getDescrip(){
       return $this->sDescrip;
    }
   
    function setFechaNacim($pdFechaNacim){
       $this->dFechaNacim = $pdFechaNacim;
    }
    function getFechaNacim(){
       return $this->dFechaNacim;
    }
   
    function setPrecio($psPrecio){
       $this->sPrecio = $psPrecio;
    }
    function getPrecio(){
       return $this->sPrecio;
    }
      function setStock($psStock){
       $this->sStock = $psStock;
    }
    function getStock(){
       return $this->sStock;
    }
       function setImagen($psImagen){
       $this->sImagen = $psImagen;
    }
    function getImagen(){
       return $this->sImagen;
    }
	
}
?>