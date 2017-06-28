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
        $this->$username=$usuario;
        $this->$password=$pass;
    }
    
    public function VerificaAcceso(){
        $oConn=new Conexion();
        
        if($oConn->Conectar())
            $db=$oConn->objconn;            
        else
            return false;

        $clavemd5=md5($this->password);
        
        $sql="SELECT * FROM user"
             ." WHERE username='$this->nomusuario' and password='$clavemd5'";
        
        $resultado=$db->query($sql);
        
       
        if($resultado->num_rows>=1){
            $row = $resultado->fetch_row();
            $this->$id=$row[0];
            $this->$username=$row[3];
            return true;
        }
        else{
            return false;
        }
            
    }
}