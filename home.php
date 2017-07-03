<?php
/*Si no esta hecho el login se regresa a la página principal*/
include 'librerias.php';
session_start();
if(!isset($_SESSION["USR"])){
                
header('Location: '.URL);
exit;

 }
?>
<!DOCTYPE html>
<html>
    <head>
    <title></title>
    <link href="css/estiloprincipal.css" rel="stylesheet" type="text/css"/>
    <link href="css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>       
        <div>    <a href="<?=URL?>controlador/cierrasesion.php">Cerrar sesión</a>  </div>
        <div>
            <?php include('menu.php');?>
        </div>
    </body>    
</html>