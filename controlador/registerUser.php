<?php
session_start();

include '../librerias.php';

$pass=$_POST['pass'];
$passMd5= md5($pass);

$iUsuario=new User();


if($iUsuario->RegistrarUsuario($_POST["nombreUser"],$passMd5,$_POST["idCamion"])){   
    echo "todo bien";   
}
else{
    echo "Todo Mal";  
}


