<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Atenciones{
    
    var $id;
    var $diaAtenciones;
    var $estado;
    var $rutLawyer;
    var $rutClient;
    
    public function __construct() {
    }
    
     public function ListarAtenciones(){
        $oConn=new Conexion();
        
        if($oConn->Conectar())
            $db=$oConn->objconn;            
        else
            return false;
       
        $sql="SELECT DATE_FORMAT(attentionDate,'%d/%m/%Y'),status,Lawyer_rut,Client_rut"
                . " FROM attention";
        
        $resultado=$db->query($sql);
        
         $i=0;
         while($row = $resultado->fetch_assoc()){
               $oClient=new Cliente();
               $oClient->diaAtenciones=$row["DATE_FORMAT(attentionDate,'%d/%m/%Y')"];
               $oClient->estado=$row["status"];
               $oClient->rutLawyer=$row["Lawyer_rut"];
               $oClient->rutClient=$row["Client_rut"];
             $arrClientes[$i]=$oClient;
             $i++;
         }
         if (isset($arrClientes)) {return $arrClientes;} else {return null;}
        
    }
    
    public function RegistrarAtencion($date="",$status="",$rutLawyer="",$rutClient=""){
        $oConn=new Conexion();     
        if ($oConn->Conectar()) {
            $db=$oConn->objconn; 
            $sql="INSERT INTO attention (attentionDate,status,Lawyer_rut,Client_rut) VALUES ('$date','$status','$rutLawyer','$rutClient')";
             $insertAttention=$db->query($sql);  
             header('location:'.URL.'cliente.php');
        }
       
    }
    
    public function DeleleAtencion($id=""){
        $oConn=new Conexion();                
        if ($oConn->Conectar()) {
        $db=$oConn->objconn; 
            $sql="DELETE FROM attention WHERE rut='$id'";
             $deleter=$db->query($sql);  
             header('location:'.URL.'cliente.php');
        }
        
    }
    
    public function UpdateAttention(){
       $oConn=new Conexion();                
        if ($oConn->Conectar()) {
        $db=$oConn->objconn; 
            $sql="UPDATE client WHERE rut='$idEliminar',password='',Profile_id=''";
             $update=$db->query($sql);  
             header('location:'.URL.'cliente.php');
        } 
    }
    
    public function BuscarAtencion(){
        
    }
}
