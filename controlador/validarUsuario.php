<?php

session_start();

include '../librerias.php';


$oUsuario=new User($_POST["user"],$_POST["pass"]);

if($oUsuario->VerificaAcceso()){
    echo "Todo Bien";
    $_SESSION["USR"]=$oUsuario;
    header('location:'.URL.'home.php');
}
else{
    echo "Todo Mal";  
}
