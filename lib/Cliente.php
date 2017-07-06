<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Cliente{
    
    var $rut;
    var $pnombre;
    var $papellido;
    var $date;
    var $direccion;
    var $tel1;
    var $tel2;
    
    public function __construct() {
    }
    
    public function ListarCliente(){
        $oConn=new Conexion();
        
        if($oConn->Conectar())
            $db=$oConn->objconn;            
        else
            return false;
       
        $sql="SELECT rut,firstName,lastName,DATE_FORMAT(createTime,'%d/%m/%Y'),address,phone1,phone2 FROM client";
        
        $resultado=$db->query($sql);
        
         $i=0;
         while($row = $resultado->fetch_assoc()){
               $oClient=new Cliente();
               $oClient->rut=$row["rut"];
               $oClient->pnombre=$row["firstName"];
               $oClient->papellido=$row["lastName"];
               $oClient->date=$row["DATE_FORMAT(createTime,'%d/%m/%Y')"];
               $oClient->direccion=$row["address"];
               $oClient->tel1=$row["phone1"];
               $oClient->tel2=$row["phone2"];
             $arrClientes[$i]=$oClient;
             $i++;
         }
         if (isset($arrClientes)) {return $arrClientes;} else {return null;}
        
    }
    
    public function RegistrarCliente($rut="",$fname="",$lname="",$date="",$adress="",$tel1="",$tel2=""){
        $oConn=new Conexion();     
        if ($oConn->Conectar()) {
            $db=$oConn->objconn; 
            $sql="INSERT INTO client (rut,firstName,lastName,createTime,address,phone1,phone2) VALUES ('$rut','$fname','$lname','$date','$adress','$tel1','$tel2')";
             $insertClient=$db->query($sql);  
             header('location:'.URL.'cliente.php');
        }
       
    }
    
    public function DeleleCliente($rutEliminar=""){
        $oConn=new Conexion();                
        if ($oConn->Conectar()) {
        $db=$oConn->objconn; 
            $sql="DELETE FROM client WHERE rut='$rutEliminar'";
             $deleter=$db->query($sql);  
             header('location:'.URL.'cliente.php');
        }
        
    }
    
    public function UpdateCliente(){
       $oConn=new Conexion();                
        if ($oConn->Conectar()) {
        $db=$oConn->objconn; 
            $sql="UPDATE client WHERE rut='$idEliminar',password='',Profile_id=''";
             $update=$db->query($sql);  
             header('location:'.URL.'cliente.php');
        } 
    }
    
    public function BuscarCliente(){
        
    }
}