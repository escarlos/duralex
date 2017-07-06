<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Abogado{
    
    var $rut;
    var $pnombre;
    var $papellido;
    var $contrato;
    var $especialidad;
    var $valorhora;
    
    public function __construct() {        
    }
    
    public function ListarAbogados(){
        $oConn=new Conexion();
        
        if($oConn->Conectar())
            $db=$oConn->objconn;            
        else
            return false;
       
        $sql="SELECT rut,firstName,lastName,DATE_FORMAT(hireDate,'%d/%m/%Y'),specialty,hourCost  froM lawyer ";
        
        $resultado=$db->query($sql);
        
         $i=0;
         while($row = $resultado->fetch_assoc()){
               $oLaw=new Abogado();
               $oLaw->rut=$row["rut"];
               $oLaw->pnombre=$row["firstName"];
               $oLaw->papellido=$row["lastName"];
               $oLaw->contrato=$row["DATE_FORMAT(hireDate,'%d/%m/%Y')"];
               $oLaw->especialidad=$row["specialty"];
               $oLaw->valorhora=$row["hourCost"];
             $arrAbogados[$i]=$oLaw;
             $i++;
         }
         if (isset($arrAbogados)) {return $arrAbogados;} else {return null;}
        
    }
    
    public function RegistrarAbogado($rut="",$fname="",$lname="",$date="",$espe="",$valor=""){
        $oConn=new Conexion();     
        if ($oConn->Conectar()) {
            $db=$oConn->objconn; 
            $sql="INSERT INTO lawyer (rut,firstName,lastName,hireDate,specialty,hourCost) VALUES ('$rut','$fname','$lname','$date','$espe','$valor')";
             $insertLaw=$db->query($sql);  
             header('location:'.URL.'abogado.php');
        }
       
    }
    
    public function DeleleAbogado($rutEliminar=""){
        $oConn=new Conexion();                
        if ($oConn->Conectar()) {
        $db=$oConn->objconn; 
            $sql="DELETE FROM lawyer WHERE rut='$rutEliminar'";
             $deleter=$db->query($sql);  
             header('location:'.URL.'abogado.php');
        }
        
    }
    
    public function UpdateAbogado(){
       $oConn=new Conexion();                
        if ($oConn->Conectar()) {
        $db=$oConn->objconn; 
            $sql="UPDATE user WHERE id='$idEliminar',password='',Profile_id=''";
             $update=$db->query($sql);  
             header('location:'.URL.'abogado.php');
        } 
    }
    
    public function BuscarAbogado(){
        
    }
}