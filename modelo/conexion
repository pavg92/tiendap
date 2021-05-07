
<?php
 error_reporting(E_ALL);
 class conexion{
     private $oConexion=null;
     function conectar1(){
        $bRet = false;
        try{
           $this->oConexion = new PDO("mysql:host=localhost;dbname=tienda","root","",  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
           $bRet = true;
        }catch(Exception $e){
           throw $e;
      }
      return $bRet;
     }

  function desconectar1(){
        $bRet = true;
        if ($this->oConexion != null){
            $this->oConexion=null;
        }
        return $bRet;
     }


     function ejecutarConsulta1($psConsulta){
         $arrRS = null;
         $rst = null;
         $oLinea = null;
         $sValCol = "";
         $i=0;
         $j=0;
         if ($psConsulta == ""){
              throw new Exception("AccesoDatos->ejecutarConsulta: falta indicar la consulta");
         }
         if ($this->oConexion == null){
           throw new Exception("AccesoDatos->ejecutarConsulta: falta conectar la base");
         }
         try{
           $rst = $this->oConexion->query($psConsulta); //un objeto PDOStatement o falso en caso de error
         }catch(Exception $e){
           throw $e;
         }
         if ($rst){
           foreach($rst as $oLinea){
             foreach($oLinea as $llave=>$sValCol){
               if (is_string($llave)){
                 $arrRS[$i][$j] = $sValCol;
                 $j++;
               }
             }
             $j=0;
             $i++;
           }
         }
         return $arrRS;
       }

       function ejecutarComando1($psComando){
   $nAfectados = -1;
        if ($psComando == ""){
          throw new Exception("AccesoDatos->ejecutarComando: falta indicar el comando");
     }
     if ($this->oConexion == null){
       throw new Exception("AccesoDatos->ejecutarComando: falta conectar la base");
     }
     try{
            $nAfectados =$this->oConexion->exec($psComando);
     }catch(Exception $e){
       throw $e;
     }
     return $nAfectados;
   }
 }
 ?>
