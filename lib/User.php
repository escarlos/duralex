<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User{
    var $id;
    var $username;
    var $password;
    var $profileId;
    
    public function __construct($usuario="",$pass="") {
        $this->username=$usuario;
        $this->password=$pass;
    }
    
    public function VerificaAcceso(){
        $oConn=new Conexion();
        
        if($oConn->Conectar())
            $db=$oConn->objconn;            
        else
            return false;

        $clavemd5=md5($this->password);
        
        $sql="SELECT * FROM user WHERE username='$this->username' and password='$clavemd5'";
        
        $resultado=$db->query($sql);
        
        
        if($resultado->num_rows>=1){
            $row = $resultado->fetch_row();
            $this->id=$row[0];
            $this->username=$row[1];
            $this->profileId=$row[3];
            return true;
        }
        else{
            return false;
        }            
    }
    
    public function ListarUsuarios(){
        $oConn=new Conexion();
        
        if($oConn->Conectar())
            $db=$oConn->objconn;            
        else
            return false;
       
        $sql="SELECT * FROM user";
        
        $resultado=$db->query($sql);
        
         $i=0;
         while($row = $resultado->fetch_assoc()){
               $oUsu=new User();
               $oUsu->id=$row["id"];
               $oUsu->username=$row["username"];
               $oUsu->password=$row["password"];
               $oUsu->profileId=$row["Profile_id"];
             $arrUsuarios[$i]=$oUsu;
             $i++;
         }
         if (isset($arrUsuarios)) {return $arrUsuarios;} else {return null;}
        
    }
    
    public function RegistrarUsuario($username="",$pass="",$profileId=""){
        $oConn=new Conexion();     
        if ($oConn->Conectar()) {
            $db=$oConn->objconn; 
            $sql="INSERT INTO user (username, password,Profile_id) VALUES ('$username','$pass','$profileId')";
             $insertUser=$db->query($sql);  
             header('location:'.URL.'usuario.php');
        }
       
    }
    
    public function DeleleUser($idEliminar=""){
        $oConn=new Conexion();                
        if ($oConn->Conectar()) {
        $db=$oConn->objconn; 
            $sql="DELETE FROM user WHERE id='$idEliminar'";
             $deleter=$db->query($sql);  
             header('location:'.URL.'usuario.php');
        }
        
    }
    
    public function UpdateUser(){
       $oConn=new Conexion();                
        if ($oConn->Conectar()) {
        $db=$oConn->objconn; 
            $sql="UPDATE user WHERE id='$idEliminar',password='',Profile_id=''";
             $update=$db->query($sql);  
             header('location:'.URL.'usuario.php');
        } 
    }
}