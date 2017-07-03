<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Perfil{
    
    var $id;
    var $nombre;
    
    public function __construct() { 
        
    }
    
     public function ListarPerfiles(){
        $oConn=new Conexion();
        
        if($oConn->Conectar())
            $db=$oConn->objconn;            
        else
            return false;
       
        $sql="SELECT * FROM profile";
        
        $resultado=$db->query($sql);
        
         $i=0;
         while($row = $resultado->fetch_assoc()){
               $oPerf=new Perfil();
               $oPerf->id=$row["id"];
               $oPerf->nombre=$row["name"];
             $arrPerfiles[$i]=$oPerf;
             $i++;
         }
         if (isset($arrPerfiles)) {return $arrPerfiles;} else {return null;}
        
    }
}
